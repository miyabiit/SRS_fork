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

        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                // 固定ページのコンテンツを出力
                the_content();
            endwhile;
        else :
            echo '<p>コンテンツが見つかりません。</p>';
        endif;
        ?>


</main>
<?php get_footer(); ?>

