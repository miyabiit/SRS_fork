<?php
/*
Template Name: newsarch
*/
?>
<?php get_header(); ?>
<?php get_template_part('global_menu'); ?>

<?php if ( function_exists( 'bcn_display' ) ) : ?>
  <div class="breadcrumb-wrap">
    <nav class="breadcrumb" aria-label="パンくずリスト">
      <?php bcn_display(); ?>
    </nav>
  </div>
<?php endif; ?>

<main>
<div class="container2">

<section id="misc" class="srsi_detail">
<div id="misc-title" class="content">
<h1 class="txt">お知らせ（<?php echo get_query_var('year');?>年<?php echo get_query_var('monthnum');?>月）</h1>
</div>
<div id="misc-border" class="border"></div>

<div class="content clearfix">
<?php if(have_posts()): ?>
  <ul id="news-arch-list" class="float_l w75">
  <?php while(have_posts()):the_post(); ?>
    <li><span class="date"><?php the_time("Y年m月d日 l  ");?></span><a href="<?php the_permalink() ?>"><?php the_title();?></a></li>
  <?php endwhile; ?>
  </ul>
<?php endif; ?>
<!-- archive block start -->
<div id="news-archives" class="float_r w25_100">
<h2 class="srsi_t">アーカイブ</h2>
<div id="news-list-sub"><h4><a href="/newsarch" style="">全て</a></h4></div><br/>
<?php
$year_prev = null;
$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,
                                    YEAR( post_date ) AS year,
                                    COUNT( id ) as post_count FROM $wpdb->posts
                                    WHERE post_status = 'publish' and post_date <= now( )
                                    and post_type = 'news'
                                    GROUP BY month , year
                                    ORDER BY post_date DESC");
foreach($months as $month) :
$year_current = $month->year;
if ($year_current != $year_prev){
if ($year_prev != null){?>
            </ul></div>
        <?php } ?>
<div><h4><?php echo $month->year; ?>年</h4>
<ul id="news-list-sub">
    <?php } ?>
    <li>
        <a href="<?php bloginfo('url') ?>/archives/date/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>?post_type=news">
            <?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月
            (<?php echo $month->post_count; ?>)
        </a>
    </li>
    <?php $year_prev = $year_current;
    endforeach; ?>
</ul></div>
</div>
<!-- archive block end -->
</div></div>
</section>



</div>
</main>
<?php get_footer(); ?>


