<?php
/*
Template Name: 商品詳細
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
<section class="product-spec">
    <!-- ヘッダー -->
    <div class="spec-header">
      <h2><?php the_title(); ?>
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
      <p class="lead"><?php the_field('comment'); ?></p>
    </div>

    <!-- メイン画像 -->
    <div class="product-grid">
    <div class="product-image">
<?php
$img1 = get_field('img1');
if(!empty($img1)){
  $url1 = str_replace(HOSTNAME_FORK, HOSTNAME_MAIN, $img1['url']); 
  $caption1 = $img1['caption'];
  $soldout = get_field('soldout');
  if($soldout){
?>


  <a id="product-image-link-soldout" data-fancybox="gallery" href="<?php echo $url1; ?>" data-image-caption="<?php echo $caption1; ?>">
<?php
	}else{
?>
  <a id="product-image-link" data-fancybox="gallery" href="<?php echo $url1; ?>" data-image-caption="<?php echo $caption1; ?>">
<?php
	}
?>
    <img src="<?php echo $url1; ?>">
  </a>
<div class="img-cap-sml"><?php echo $caption1; ?></div>
<?php } ?>
      </div>
      <!-- 価格＋基本仕様 -->
      <div class="spec-data">

        <!-- 価格ブロック（上部だけ） -->
        <div class="price-block">
          <?php $value = get_field('price02') ; if(empty($value)) : else:?>
          <div class="price-item">
            <span class="title">現状販売価格</span>
            <span class="price">
              <span class="num"><?php echo number_format((int)get_field('price02')); ?></span><span class="yen">円</span><br>
              <span class="yen">(税込価格<?php echo number_format((int)get_field('price02')*TAX_RATIO); ?>円)</span>
            </span>
          </div>
          <?php endif;?>
          <?php $value = get_field('price') ; if(empty($value)) : else:?>
          <div class="price-item service">
            <span class="title">メンテナンス込み価格</span>
            <span class="price">
            <span class="num"><?php echo number_format((int)get_field('price')); ?></span><span class="yen">円</span><br>
            <span class="yen">(税込価格<?php echo number_format((int)get_field('price')*TAX_RATIO); ?>円)</span>
            </span>
          </div>
          <?php endif;?>
          <span class="note sml">別途、諸費用（設置費・運賃等）が発生いたします。</span>
        </div>

        <!-- 基本仕様ブロック -->
        <dl class="spec-list">
          <dt>クラス（トン数）</dt><dd><?php the_field('class'); ?></dd>
          <dt>メーカー／型式</dt><dd><?php the_field('maker'); ?></dd>
          <dt>タイプ（動力）</dt><dd><?php $term_id = get_field('type'); $term = get_term($term_id, 'etc_type_cat'); echo $term->name; ?></dd>
        </dl>

      </div>
    </div>

    <!-- サムネイル -->
    <div class="thumbs">
      <?php for($i=1; $i<=24; $i++):
        $img = get_field('img'.$i);
        if($img):
          $url = str_replace(HOSTNAME_FORK, HOSTNAME_MAIN, $img['url']); 
          $thumb = str_replace(HOSTNAME_FORK, HOSTNAME_MAIN, $img['sizes']['thumbnail']);
      ?>
      <a href="<?php echo esc_url($url); ?>" data-fancybox="gallery">
        <img decoding="async" src="<?php echo esc_url($thumb); ?>" alt="">
      </a>
      <?php endif; endfor; ?>
    </div>

<?php if(get_field('youtube')): ?>
<div class="spec-video-block">
  <h3>紹介動画</h3>
  <div class="video-wrapper">
    <iframe src="<?php the_field('youtube'); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</div>
<?php endif; ?>

    <!-- 仕様＋コメント横並び -->
    <div class="spec-meta">
      <!-- 左：仕様ブロック -->
      <div class="spec-block">
        <h3>仕様</h3>
        <dl class="spec-list">
<dt>マスト</dt>
<dd><?php $term_id = get_field('mast'); $term = get_term($term_id, 'etc_mast_cat'); echo $term ? $term->name : ''; ?></dd>
<dt>最大揚高</dt>
<dd><?php the_field('lifting_height'); ?></dd>
<dt>最大荷重</dt>
<dd><?php the_field('max_load'); ?></dd>
<dt>駆動</dt>
<dd><?php the_field('drive'); ?></dd>
<dt>商品コード／管理No</dt>
<dd><?php the_field('code'); ?></dd>
<dt>年式</dt>
<dd><?php the_field('model'); ?></dd>
<dt>稼働時間</dt>
<dd><?php the_field('time'); ?></dd>
<dt>ツメ長</dt>
<dd><?php the_field('claw_length'); ?></dd>
<dt>備考</dt>
<dd><?php the_field('remarks'); ?></dd>
<dt>資料</dt>
<dd>
  <?php echo doc_link('doc1'); ?>
  <?php echo doc_link('doc2'); ?>
  <?php echo doc_link('doc3'); ?>
</dd>
        </dl>
      </div>

      <!-- 右：コメントブロック（価格削除） -->
      <div class="comment-block">
        <dl>
<dt class="title">コメント</dt>
<dd class="content"><?php the_field('staff_comment'); ?></dd>
        </dl>
      </div>
    </div>

    <!-- お問い合わせ -->
    <div class="spec-info-block">
      <h2>この商品に関するお問い合わせ</h2>
      <div class="spec-info-box">
        <div class="spec-info-item">
<dl>
  <dt>保有場所</dt>
  <dd><?php $term = get_field('stock_point'); echo $term->post_title; ?></dd>
  <dt>お問い合わせ先</dt>
  <dd><?php $term = get_field('req'); echo $term->post_title; ?></dd>
  <dt>電話番号</dt>
  <dd><a href="tel:<?php the_field('tel'); ?>"><?php the_field('tel'); ?></a></dd>
</dl>

        </div>
      </div>
    </div>

    <!-- アクション -->
<div class="actions" id="js-floating-end">
  <a href="#" onclick="window.print(); return false;" class="btn outline">
    <i class="fas fa-print"></i> 印刷する
  </a>
  <a href="/etc-contact?goods_title=<?php the_title(); ?>&goods_code=<?php the_field('code'); ?>" class="btn primary">
    <i class="fas fa-envelope"></i> お問い合わせ
  </a>
</div>


</section>
</div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
  if(window.Fancybox) {
    Fancybox.bind("[data-fancybox='gallery']", {
      Thumbs: { autoStart: true },
      Toolbar: { display: ["close"] },
    });
  }
});
</script>

<?php get_footer(); ?>
