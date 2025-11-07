<?php
/*
Template Name: 商品検索結果-etc-result
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
<?php
function query_for_taxonomy($mypost_type,$mytaxlist,$mymetalist){
  //global $authors_kyusyu;
  $args = array(
    'post_type' => $mypost_type,
    'posts_per_page' => 16,
    'paged' => get_query_var('paged'),
    'orderby' => 'date'
  );
  $tax_args = array(
    'relation' => 'AND',
  );
  foreach($mytaxlist as $mytax){
    if(isset($_GET[$mytax])){
      array_push($tax_args,
        array(
          'taxonomy' => $mytax,
          'field' => 'slug',
          'terms' => $_GET[$mytax]
        )
      );
    }
  }
  $args['tax_query'] = $tax_args;
  $meta_args = array(
    'relation' => 'AND',
  );
  foreach($mymetalist as $mymeta){
    if(isset($_GET[$mymeta])){
      array_push($meta_args,
        array(
          'key' => 'req',
          'value' => $_GET[$mymeta],
          'compare' => 'IN'
        )
      );
    }
  }
  $args['meta_query'] = $meta_args;

  if(!is_user_logged_in()){
    $args['post_status'] = 'publish'; // ログイン中は非公開も表示
  }
  if(isset($_GET['keyword'])){
    $args['s'] = $_GET['keyword'];
  }
  return $args;
}

$args = query_for_taxonomy('etc', array('etc_class_cat', 'etc_type_cat', 'etc_mast_cat','etc_price_range_cat','etc_model_cat','etc_time_cat'),array('req'));
$wp_query = new WP_query();
$wp_query->query($args);
?>

<main>
<div class="container2">

<?php
  // 「価格で探す」と「稼働時間で探す」は～XXXは～XXX以下の選択肢を全て含む
  $args = query_for_taxonomy('etc', array('etc_class_cat', 'etc_type_cat', 'etc_mast_cat','etc_price_range_cat','etc_model_cat','etc_time_cat'),array('req'));
  $wp_query = new WP_Query();
  $wp_query->query($args);
?>

<section class="search-results-pagination">
<div class="content flex">
<div class="hits flex strong_f"><!-- <span class="num"><?php echo $wp_query->found_posts; ?></span>  件 ヒットしました --><span class="more othr"><a href="/etc-search/?<?php echo http_build_query($_GET); ?>"><i class="fas fa-filter"></i>もっと絞り込む</a></span></div>
<div class="pagination">
<?php
    $big = 9999999999;
    $arg = array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'current' => max( 1, get_query_var('paged') ),
        'total'   => $wp_query->max_num_pages,
        'prev_text' => __('<i class="fas fa-angle-double-left"></i>'),
        'next_text' => __('<i class="fas fa-angle-double-right"></i>')
    );
    echo paginate_links($arg);
?>
</div>
</div>
</section>
<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
<section class="searched-product">
<h2>
    <span class="product_name"><?php the_title(); ?></span>
	
<?php
$terms = get_the_terms($post->ID, 'mark_label_cat');
$tags = [];
if($terms) foreach($terms as $term)array_push($tags, $term->slug);
if(in_array("newone",$tags)) print '<span class="product_list_sign red strong_f">NEW</span>';
if(in_array("recommend",$tags)) print '<span class="product_list_sign orange strong_f">おすすめ</span>';
if(in_array("goodone",$tags)) print '<span class="product_list_sign blue strong_f">美品</span>';
if(in_array("nowship",$tags)) print '<span class="product_list_sign green strong_f">即出荷</span>';
if(in_array("onsale",$tags)) print '<span class="product_list_sign gray strong_f">商談中</span>';
if(in_array("condition",$tags)) print '<span class="product_list_sign gray strong_f">快適</span>';
?>	
</h2>
<p><?php echo get_post_meta($post->ID, 'comment', true); ?></p>

<div class="searched_product_data">
<?php
$img = get_field('img1');
if(!empty($img)){ $img['url'] = str_replace(HOSTNAME_FORK, HOSTNAME_MAIN, $img['url']); }
$link = get_permalink($post->ID);
if(!empty($link)){ $link = str_replace(HOSTNAME_FORK, HOSTNAME_MAIN, $link); }
if(!empty($img)){
	$soldout = get_field('soldout');
	if($soldout){
		echo '<div class="product_image soldout"><a href="' . $link . '"><img src="' . $img['url'] . '"></a></div>';
	}else{
		echo '<div class="product_image"><a href="' . $link . '"><img src="' . $img['url'] . '"></a></div>';
	}
}
?>

<div class="product_data">
<div class="product_detail">
<dl>
<dt class="product_data_title">クラス（トン数）</dt>
<dd class="product_data_content"><?php the_field('class'); ?></dd>
<dt class="product_data_title">タイプ（動力）</dt>
<dd class="product_data_content"><?php $term_id = get_field('type'); $term = get_term($term_id, 'etc_type_cat'); echo $term->name; ?></dd>
</dl>
<dl>
<dt class="product_data_title">メーカー／型式</dt>
<dd class="product_data_content"><?php the_field('maker'); ?></dd>

<?php $value = get_field('price02') ; if(empty($value)) : else:?>
<dt class="product_data_title">現状販売価格</dt>
<dd class="product_data_content">
  <span class="num"><?php echo number_format((int)get_field('price02')); ?></span>円<br/>
  (税込価格<?php echo number_format((int)get_field('price02')*TAX_RATIO); ?>円)
</dd>
<?php endif;?>

<?php $value = get_field('price') ; if(empty($value)) : else:?>
<dt class="product_data_title">メンテナンス込み価格</dt>
<dd class="product_data_content">
  <span class="num"><?php echo number_format((int)get_field('price')); ?></span>円<br/>
  (税込価格<?php echo number_format((int)get_field('price')*TAX_RATIO); ?>円)
</dd>
<?php endif;?>
</dl>
</div>

<h3><i class="fas fa-square"></i> 仕様</h3>
<div class="product_spec">
<div class="product_detail">
<dl>
<dt class="product_data_title">マスト</dt>
<dd class="product_data_content"><?php $term_id = get_field('mast'); $term = get_term($term_id, 'etc_mast_cat'); echo $term->name; ?></dd>
<dt class="product_data_title">最大揚高</dt>
<dd class="product_data_content"><?php the_field('lifting_height'); ?></dd>
<dt class="product_data_title">最大荷重</dt>
<dd class="product_data_content"><?php the_field('max_load'); ?></dd>
<dt class="product_data_title">駆動</dt>
<dd class="product_data_content"><?php the_field('drive'); ?></dd>
</dl>
<dl>
<dt class="product_data_title">年式</dt>
<dd class="product_data_content"><?php the_field('model'); ?></dd>
<dt class="product_data_title">稼働時間</dt>
<dd class="product_data_content"><?php the_field('time'); ?></dd>
<dt class="product_data_title">ツメ長</dt>
<dd class="product_data_content"><?php the_field('claw_length'); ?></dd>
<dt class="product_data_title">備考</dt>
<dd class="product_data_content"><?php the_field('remarks'); ?></dd>
</dl>
</div>

</div>
</div>
</div>
<div class="product_contact">
<div class="contact_info">
  <span class="contact strong_f">お問い合わせ</span>
  <div class="icon_and_number">
    <i class="fas fa-phone-square"></i>
    <span class="num"><a href="tel:<?php the_field('tel'); ?>"><?php the_field('tel'); ?></a></span>
  </div>
</div>
    <div class="product_see_more">
      <a href="<?php echo get_permalink($post->ID );?>" title="<?php echo get_the_title($post->ID);?>">詳細を見る <i class="fas fa-angle-double-right"></i>
      </a>
    </div>

</div>
</section>
<?php endwhile; ?>

<section class="search-results-pagination">
<div class="content flex">
<div class="hits flex strong_f"><!-- <span class="num"><?php echo $wp_query->found_posts; ?></span>  件 ヒットしました --><span class="more othr"><a href="/etc-search/?<?php echo http_build_query($_GET); ?>"><i class="fas fa-filter"></i>もっと絞り込む</a></span></div>
<div class="pagination">
<?php
    $big = 9999999999;
    $arg = array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'current' => max( 1, get_query_var('paged') ),
        'total'   => $wp_query->max_num_pages,
        'prev_text' => __('<i class="fas fa-angle-double-left"></i>'),
        'next_text' => __('<i class="fas fa-angle-double-right"></i>')
    );
    echo paginate_links($arg);
?>
</div>
</div>
</section>

</div>
</main>
<?php get_footer(); ?>


