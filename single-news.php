<?php
/*
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
<section id="misc" class="srsi_detail">
<?php if(have_posts()): while(have_posts()):the_post(); ?>
<div class="container2">
<div id="misc-title" class="content">
<h2 class="txt"><?php the_title(); ?></h2>
</div>
<div id="misc-border" class="border"></div>
<div class="content">
<div id="news-publish-date" class="text_r"><i class="fa fa-clock"></i><?php the_time('Y-m-d');?></div>
<?php
  // リンク先urlを書き換え
  $content = get_the_content();
  $content = apply_filters('the_content', $content);
  $content = str_replace(HOSTNAME_MAIN, HOSTNAME_KYUSYU, $content);
  $content = str_replace('/office_', '/corporate/branches', $content); // 展示場一覧のリンク
  $content = str_replace(HOSTNAME_KYUSYU.'/wp-content/uploads/', HOSTNAME_MAIN.'/wp-content/uploads/', $content); // uploadコンテンツへのリンクはメインサイトのまま
  print $content
?>
<?php end while; endif; ?>
</div>
</section>


</div>
</main>
<?php get_footer(); ?>
