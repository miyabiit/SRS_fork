<?php
/*
Template Name: お知らせ
*/
?>
<?php get_header(); ?>
<?php set_dbprefix_main(); ?>
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
<h2 class="txt"><?php the_title(); ?></h2>
</div>
<div id="misc-border" class="border"></div>
<div class="content">
<div id="news-publish-date" class="text_r"><i class="fa fa-clock"></i><?php the_time('Y-m-d');?></div>
<?php the_content(); ?>
</div>
</section>
<!-- ?php end while; endif; ? -->


</div>
</main>
<?php get_footer(); ?>
