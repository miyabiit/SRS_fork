<?php
/*
Template Name: etc-search
*/
?>
<?php get_header('etc'); ?>
<?php set_dbprefix_main(); ?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MLP5BT34"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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

<section>
<div class="content">

<form id="keyword-search-box" class="flex" method="get" action="<?php echo home_url(); ?>">
<div id="search-title" class="disp_f text_c">サイト内検索</div>
<input type="hidden" name="post_type" id="post_type" value="etc">
<input type="text" value="" name="s" id="s" />
<button type="submit"><i class="fas fa-search"></i></button>
</form>

</div>
</section>

<section id="search-check-box">
<div class="content">
<form class="clearfix" role="search" method="get" action="/etc-result">

<?php
  $args = query_for_taxonomy('etc', array('etc_class_cat', 'etc_type_cat', 'etc_mast_cat','etc_price_range_cat','etc_model_cat','etc_time_cat'),array('req'));
  $wp_query = new WP_query();
  $wp_query->query($args);
?>
<!--
<div id="search-head-num">
<div class="search-hits strong_f">該当件数 <span class="num"><?php echo $wp_query->found_posts; ?></span> 件</div><button type="submit" id="search-all" class="btn unit disp_f"><i class="fas fa-search"></i></button>
</div>
-->
<div class="search-check-selection clearfix">
<div class="check-selections clearfix">
<div class="search-button"><!-- <div class="search-hits strong_f">該当件数 <span class="num"><?php echo $wp_query->found_posts; ?></span> 件</div> --><button type="submit" id="search-all" class="btn othr disp_f"><i class="fas fa-search"></i> フォークリフト・その他商品を探す</button></div>
</div>
</div>

<div class="search-check-selection clearfix">
<span class="othr strong_f selection_title">クラス(トン数)</span>
<div class="check-selections clearfix">
<ul>
    <li>
<?php
  wp_reset_query();
  my_checkbox_list_taxonomy('etc_class_cat');
?>
    </li>
</ul>
<button type="submit" class="btn btn_s othr strong_f float_r"><i class="fas fa-search"></i> この条件で探す</button>
</div>
</div>

<div class="search-check-selection clearfix">
<span class="othr strong_f selection_title">タイプ(動力)で探す</span>
<div class="check-selections clearfix">
<ul>
    <li>
<?php
  wp_reset_query();
  my_checkbox_list_taxonomy('etc_type_cat');
?>
    </li>
</ul>
<button type="submit" class="btn btn_s othr strong_f float_r"><i class="fas fa-search"></i> この条件で探す</button>
</div>
</div>

<div class="search-check-selection clearfix">
<span class="othr strong_f selection_title">マストで探す</span>
<div class="check-selections clearfix">
<ul>
    <li>
<?php
  wp_reset_query();
  my_checkbox_list_taxonomy('etc_mast_cat');
?>
    </li>
</ul>
<button type="submit" class="btn btn_s othr strong_f float_r"><i class="fas fa-search"></i> この条件で探す</button>
</div>
</div>

<div class="search-check-selection clearfix">
<span class="othr strong_f selection_title">価格で探す</span>
<div class="check-selections clearfix">
<ul>
    <li>
<?php
  wp_reset_query();
  my_checkbox_list_taxonomy('etc_price_range_cat');
?>
    </li>
</ul>
<button type="submit" class="btn btn_s othr strong_f float_r"><i class="fas fa-search"></i> この条件で探す</button>
</div>
</div>

<div class="search-check-selection clearfix">
<span class="othr strong_f selection_title">年式で探す</span>
<div class="check-selections clearfix">
<ul>
    <li>
<?php
  wp_reset_query();
  my_checkbox_list_taxonomy('etc_model_cat');
?>
    </li>
</ul>
<button type="submit" class="btn btn_s othr strong_f float_r"><i class="fas fa-search"></i> この条件で探す</button>
</div>
</div>

<div class="search-check-selection clearfix">
<span class="othr strong_f selection_title">稼働時間で探す</span>
<div class="check-selections clearfix">
<ul>
    <li>
<?php
  wp_reset_query();
  my_checkbox_list_taxonomy('etc_time_cat');
?>
    </li>
</ul>
<button type="submit" class="btn btn_s othr strong_f float_r"><i class="fas fa-search"></i> この条件で探す</button>
</div>
</div>

<?php
  $args = query_for_taxonomy('etc', array('etc_class_cat', 'etc_type_cat', 'etc_mast_cat','etc_price_range_cat','etc_model_cat','etc_time_cat'),array('req'));
  $wp_query = new WP_query();
  $wp_query->query($args);
?>
<div class="search-check-selection clearfix">
<div class="check-selections clearfix">
<div class="search-button"><!-- <div class="search-hits strong_f">該当件数 <span class="num"><?php echo $wp_query->found_posts; ?></span> 件</div> --><button type="submit" id="search-all" class="btn othr disp_f"><i class="fas fa-search"></i> フォークリフト・その他商品を探す</button></div>
</div>
</div>

</form>
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
<script src="/js/search-checkbox.js"></script>
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
