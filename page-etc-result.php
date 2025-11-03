<?php
/*
Template Name: etc-result
*/
?>
<?php get_header(); ?>
<?php set_dbprefix_main(); ?>
<body>

<section id="head">
<div id="head_info" class="no-sp">
<div class="content">
<div class="flex clearfix">
<div class="flex text_r tel_info">受付時間 8:30～17:00（土日・祝日を除く）
<a class="onc" onclick="return gtag_report_conversion('tel:0120-590-907');" href="tel:0120-590-907">
<span class="tel num"><img src="/images/freedial.png" class="freedial" alt="フリーダイアル">0120-590-907</span>
</a>
</div>
<div class="xs">商品に関するご質問やご相談など、お気軽にお問い合わせください。</div>
</div>
<p id="links" class="topm"><a href="/">HOME</a> | <a href="/srs/_privacy.html">プライバシーポリシー</a> | <a href="/srs/_sitemap.html">サイトマップ</a> | <a href="/office_">店舗情報</a> | <a href="srs/_corporate.html">会社案内</a></p>
</div>
</div>
</div>
<a href="/" class="no-pc"><img src="/images/home_sp.png" id="sp-logo" alt="エスアールエス ホームへ"></a>
<div class="content clearfix">
<header>
<div id="btn_menu"><a href="#" class="noscroll"><span class="box"><span></span><span></span><span></span></span></a></div>
<nav>
<ul id="nav_menu" class="clearfix">
<li id="logo"><a href="/">ホーム</a></li>
<li class="text_c unit"><a href="/unitproducts" class="disp_f">ユニットハウス</a></li>
<li class="text_c atch"><a href="/pmproducts" class="disp_f">アタッチメント</a></li>
<li class="text_c lift"><a href="/btproducts" class="disp_f">高所作業車・仮設機材</a></li>
<li class="text_c othr"><a href="/etcproducts" class="disp_f">フォークリフト・その他</a></li>
</ul>
</nav>
</header>
</div>
</section>

<section id="sub-menu" class="othr">
<div class="content clearfix">
<div id="sub_title" class="no-pc strong_f">フォークリフト・その他</div>
<nav>
<ul id="sub_menu" class="clearfix">
<li id="back" class="no-sp"><a href="/etcproducts" class="disp_f">カテゴリトップに戻る</a></li>
<li class="text_c"><a href="/etc-search" class="disp_f">商品検索</a></li>
<li class="text_c"><a href="/srs/_etc-guide-top.html" class="disp_f">ご利用ガイド</a></li>
<li class="text_c"><a href="/etc-info" class="disp_f">ご案内</a></li>
<li class="text_c"><a href="/etc-contact" class="disp_f">お問い合わせ</a></li>
</ul>
</nav>
</div>
</section>

<section id="breadcrumb">
<div class="content">
<ul class="breadcrumb clearfix">
<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="/" itemprop="url">
<span itemprop="title">ホーム</span>
</a> >
</li>
<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="/etcproducts" itemprop="url">
<span itemprop="title">フォークリフト・その他</span>
</a> >
</li>
<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="/etc-search" itemprop="url">
<span itemprop="title">商品検索メニュー</span>
</a> >
</li>
<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="/etc-result" itemprop="url">
<span itemprop="title">検索結果</span>
</a>
</li>
</ul>
</div>
</section>

<div id="followup-bg">
  <div id="followup-main">
        <a href="/etc-contact" target="_blank">
        <img src="/images/mail-floatbnr-pc.png" class="followup_pc" alt="お問い合わせ">
<img src="/images/mail-floatbnr-sp820.png" class="followup_sp" alt="お問い合わせ">
    </a>
  </div>
</div>

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
<section id="search-results">
<div class="content">


<?php
while( $wp_query->have_posts()) : $wp_query->the_post();
?>
<section class="searched-product product_data_othr">
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
<div class="searched_product_data flex">
<?php
$img = get_field('img1');
$link = get_permalink($post->ID);
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
<div class="product_detail flex clearfix">
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
<div class="product_detail flex clearfix">
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
<div class="product_contact flex">
<div class="contact_info"><span class="contact strong_f">お問い合わせ</span><i class="fas fa-phone-square"></i><span class="num"><a href="tel:<?php the_field('tel'); ?>"><?php the_field('tel'); ?></a></span></div>
<div class="product_see_more othr"><a href="<?php echo get_permalink($post->ID );?>" title="<?php echo get_the_title($post->ID);?>">詳細を見る <i class="fas fa-angle-double-right"></i></a></div>
</div>
</section>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

</div>
</section>

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

<div id="not_followup"><!--追従非表示-->
<?php get_template_part('p-etc_contact'); ?>
</div><!--追従表示-->

<section id="footer" class="srsd">
<div class="content">
<footer class="clearfix flex">
<div id="company-info">
<p id="company" class="flex"><a href="http://www.srscorp.co.jp/" target="_blank"><img src="/images/srs.png" alt="エスアールエス株式会社ロゴマーク"></a>
<span>ユニットハウス、アタッチメント、高所作業車、フォークリフトの中古販売なら<span id="company-name"><a href="http://www.srscorp.co.jp/" target="_blank">エスアールエス株式会社</a></span></span></p>
</div>
<div>
<p id="links" class=""><a href="/">HOME</a> | <a href="/srs/_privacy.html">プライバシーポリシー</a> | <a href="/srs/_sitemap.html">サイトマップ</a> | <a href="/office_">店舗情報</a> | <a href="srs/_corporate.html">会社案内</a></p>
<p id="copy" class="xs">Copyright &copy; 2021 SRS Corporation. <br>All Rights Reserved.</p>
</div>
<div id="pagetop" class="srsd"><i class="fas fa-chevron-circle-up"></i> 上へ戻る</div>
</footer>
</div>

</section>
<link rel="stylesheet" href="/css/main.css">
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="/js/jquery.debouncedresize.min.js"></script>
<script src="/js/common.js"></script>
<script>
    // フローティング
$(function() {
  $(window).scroll(function () {
    var banner = $('#followup-bg');
    var off = $('#not_followup').offset();
    if ($(this).scrollTop() > off.top -600) {
        banner.fadeOut();
    } else {
        banner.fadeIn();
    }
  })
});
</script>

<?php get_footer(); ?>
