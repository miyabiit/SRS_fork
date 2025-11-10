<?php get_header(); ?>
<?php set_dbprefix_main(); ?>
<?php get_template_part('global_menu'); ?>
<main>

<div class="mainimg">
<div class="swiper srs_slider swiper-fade swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden">
<div class="hero-nav">
  <a href="#recommend" class="hero-btn">新着商品</a>
  <a href="#merit" class="hero-btn">選ばれる理由</a>
  <a href="#etc_flow" class="hero-btn">ご購入の流れ</a>
  <a href="#news" class="hero-btn">お知らせ</a>
</div>
  <div class="swiper-wrapper" id="swiper-wrapper-abe7389b846821035" aria-live="off" style="transition-duration: 0ms; transition-delay: 0ms;">
<div class="mainimg-key">
<div class="mainimg-key_ttl">中古フォークリフトの購入をご検討中の皆様へ<br>
ご希望の条件にかなう商品をご案内いたします。</div>
<p>【主な取扱いメーカー】<br>
トヨタ、三菱、TCM、ユニキャリア、日産、住友ナコ、ニチユ、コマツ、など多数</p>
</div>

<div class="swiper-slide swiper-slide-prev" style="width: 859px; opacity: 1; transform: translate3d(-2577px, 0px, 0px); transition-duration: 0ms;" role="group" aria-label="1 / 5" data-swiper-slide-index="0">
      <div class="swiper-img">
      <img src="<?php echo get_template_directory_uri();?>/img/top/img1.jpg" alt="">
      </div>
    </div>
<div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-active" style="width: 859px; opacity: 1; transform: translate3d(-3436px, 0px, 0px); transition-duration: 0ms;" role="group" aria-label="2 / 5" data-swiper-slide-index="1">
      <div class="swiper-img">
      <img src="<?php echo get_template_directory_uri();?>/img/top/img6.jpg" alt="">
      </div>
    </div>

  <div class="swiper-slide swiper-slide-next" style="width: 859px; opacity: 1; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;" role="group" aria-label="3 / 5" data-swiper-slide-index="2">
      <div class="swiper-img">
      <img src="<?php echo get_template_directory_uri();?>/img/top/img2.png" alt="">
      </div>
    </div>
<!--
<div class="swiper-slide" style="width: 859px; opacity: 1; transform: translate3d(-859px, 0px, 0px); transition-duration: 0ms;" role="group" aria-label="4 / 5" data-swiper-slide-index="3">
      <div class="swiper-img">
      <img src="<?php echo get_template_directory_uri();?>/img/top/img_6.jpg" alt="">
      </div>
    </div>
<div class="swiper-slide" style="width: 859px; opacity: 1; transform: translate3d(-1718px, 0px, 0px); transition-duration: 0ms;" role="group" aria-label="5 / 5" data-swiper-slide-index="4">
      <div class="swiper-img">
      <img src="<?php echo get_template_directory_uri();?>/img/top/img_5.jpg" alt="">
      </div>
    </div>
-->

</div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

</div>

<div class="main-top">

<section id="welcome-txt" class="section-style">
<div class="container2">
	<div class="headline-section blue">
		<div class="headline-subtitle">エスアールエスショッピング<br>フォークリフトカテゴリーサイトへようこそ。</div>
		<div class="headline-main">このウェブサイトでは、<br>中古フォークリフトを販売しています。</div>
		<div class="headline-com">販売している商品は「おすすめ中古フォークリフト」から選択、もしくは以下の検索機能を使ってご希望の商品をお探しください。<br>
			なお検索機能は動力のタイプ、マストの種類、クラス（トン数）、年式、価格、稼働時間など、様々な条件での絞込みが可能です。<br>
			商圏は関東一円（東京・神奈川・千葉・埼玉・群馬・栃木・茨城）を想定しており、どの取扱商品も自信をもっておすすめしておりますので、ぜひ信頼と実績のエスアールエスをご検討ください。
</div>
	</div>
</div>
</section>

<section id="search-box" class="section-style">
  <div class="container2">
    <h2 class="headline-title">
      <i class="fas fa-sliders-h"></i> 条件から探す<span class="sub-title">｜ご希望の条件にかなう最適な商品をご案内</span>
    </h2>

<form role="search" method="get" action="/etc-result" class="search-form">
  <div class="search-group">

    <div class="search-column">
      <label>
        <span>タイプ(動力)で探す</span>
        <?php mydropdown_taxsonomy("etc_type_cat"); ?>
      </label>

      <label>
        <span>クラス(トン数)で探す</span>
        <?php mydropdown_taxsonomy("etc_class_cat"); ?>
      </label>

      <label>
        <span>価格で探す</span>
        <?php mydropdown_taxsonomy("etc_price_range_cat"); ?>
      </label>
    </div>

    <div class="search-column">
      <label>
        <span>マストで探す</span>
        <?php mydropdown_taxsonomy("etc_mast_cat"); ?>
      </label>

      <label>
        <span>年式で探す</span>
        <?php mydropdown_taxsonomy("etc_model_cat"); ?>
      </label>

      <label>
        <span>稼働時間で探す</span>
        <?php mydropdown_taxsonomy("etc_time_cat"); ?>
      </label>
    </div>

  </div>

  <div class="search-button">
    <button type="submit" class="btn">
      <i class="fas fa-search"></i> この条件で検索する
    </button>
  </div>

  <div id="text-search-section" class="text-search">
    <h3><i class="fas fa-keyboard"></i> テキストで検索</h3>
    <div class="text-search-box">
      <input type="text" name="s" placeholder="キーワードを入力してください" />
      <button type="submit" class="btn">
        <i class="fas fa-search"></i> キーワード検索
      </button>
    </div>
  </div>
</form>

<!--
<h1>★確認用★</h1>
    <form role="search" method="get" action="/etc-result" class="search-form">
      <div class="search-group">

        <div class="search-column">
          <label>
            <span>タイプ(動力)で探す</span>
            <select name="etc_type_cat">
              <option value="0">–</option>
              <option value="type01">ディーゼルカウンター</option>
              <option value="type02">ガソリンカウンター</option>
              <option value="type03">バッテリーカウンター</option>
              <option value="type04">ＬＰＧカウンター</option>
              <option value="type05">ガソリン/ＬＰＧカウンター</option>
              <option value="type06">バッテリーリーチ</option>
              <option value="type07">その他</option>
            </select>
          </label>

          <label>
            <span>クラス(トン数)で探す</span>
            <select name="etc_class_cat">
              <option value="0">–</option>
              <option value="class01">～0.9ｔ</option>
              <option value="class02">1.0ｔ～1.5ｔ</option>
              <option value="class03">2.0ｔ～2.5ｔ</option>
              <option value="class04">3.0ｔ～3.5ｔ</option>
              <option value="class05">4.0ｔ～4.5ｔ</option>
              <option value="class06">5.0ｔ～8.0ｔ</option>
              <option value="class07">10.0ｔ～</option>
            </select>
          </label>

          <label>
            <span>価格で探す</span>
            <select name="etc_price_range_cat">
              <option value="0">–</option>
              <option value="price01">～50万円未満</option>
              <option value="price02">～100万円未満</option>
              <option value="price03">～200万円未満</option>
              <option value="price04">～300万円未満</option>
              <option value="price05">300万円以上</option>
            </select>
          </label>
        </div>

        <div class="search-column">
          <label>
            <span>マストで探す</span>
            <select name="etc_mast_cat">
              <option value="0">–</option>
              <option value="mast01">2段スタンダード</option>
              <option value="mast02">2段フルフリー</option>
              <option value="mast03">3段フルフリー</option>
              <option value="mast04">ハイマスト</option>
              <option value="mast05">ローマスト</option>
            </select>
          </label>

          <label>
            <span>年式で探す</span>
            <select name="etc_model_cat">
              <option value="0">–</option>
              <option value="model01">～2000年</option>
              <option value="model02">2001年～2010年</option>
              <option value="model03">2011年～2020年</option>
              <option value="model04">2021年～</option>
            </select>
          </label>

          <label>
            <span>稼働時間で探す</span>
            <select name="etc_time_cat">
              <option value="0">–</option>
              <option value="time01">～1000時間未満</option>
              <option value="time02">～3000時間未満</option>
              <option value="time03">～5000時間未満</option>
              <option value="time04">～10000時間未満</option>
              <option value="time05">10000時間以上</option>
            </select>
          </label>
        </div>

      </div>

      <div class="search-button">
        <button type="submit" class="btn">
          <i class="fas fa-search"></i> この条件で検索する
        </button>
      </div>

<div id="text-search-section" class="text-search">
  <h3><i class="fas fa-keyboard"></i> テキストで検索</h3>
  <div class="text-search-box">
    <textarea name="s" placeholder="キーワードを入力してください"></textarea>
    <button type="submit" class="btn">
      <i class="fas fa-search"></i> キーワード検索
    </button>
  </div>
</div>
    </form>
  </div>
</section>
-->
<section id="recommend" class="section-style">
  <div class="container2">
    <h2 class="headline-title"><i class="fas fa-thumbs-up"></i> 新着商品|<span class="etc_new_com">おすすめ中古フォークリフト</span></h2>
    <p class="recommend_etc_com">現在は「エンジン式」「ハイマスト」の商品を特におすすめしております。<br>
    その他の商品も是非細部まで情報をご確認ください。</p>

    <div class="products">
      <?php
      $query = new WP_Query(array(
        'post_type' => 'etc',
        'posts_per_page' => 16,
        'orderby' => 'date',
        'order' => 'DESC'
      ));
      while($query->have_posts()) : $query->the_post();
      ?>
      <div class="product-card">
        <a href="<?php the_permalink(); ?>">
          <div class="product-content">
            <div class="product-catch"><?php the_field('comment'); ?></div>

            <?php
            $soldout = get_field("soldout");
            $img = get_field('img1');
            if ($soldout) echo '<div class="product_list_img_soldout">';
            if (!empty($img)) echo '<img src="' . esc_url($img['url']) . '" alt="商品画像">';
            if ($soldout) echo '</div>';
            ?>

            <div class="product-title"><?php the_title(); ?></div>

            <div class="product-detail-group">
              <div class="product-detail">メーカー</div>
              <div class="product_list_info_data"><?php the_field('maker'); ?></div>
              <div class="product-detail">商品番号</div>
              <div class="product_list_info_data"><?php the_field('code'); ?></div>
            </div>

            <div class="product-price-group">
              <?php $value = get_field('price02'); if(empty($value)) : else: ?>
                <div class="product-price-item">現状販売価格</div>
                <div class="product-price-value"><?php echo number_format((int)get_field('price02')); ?>円</div>
                <div class="tax-price">(税込価格: <?php echo number_format((int)get_field('price02') * TAX_RATIO); ?>円)</div>
              <?php endif; ?>

              <?php $value = get_field('price'); if(empty($value)) : else: ?>
                <div class="product-price-item">メンテナンス込み価格</div>
                <div class="product-price-value"><?php echo number_format((int)get_field('price')); ?>円</div>
                <div class="tax-price">(税込価格: <?php echo number_format((int)get_field('price') * TAX_RATIO); ?>円)</div>
              <?php endif; ?>
            </div>
          </div>

<div class="product_list_tags">
<?php
$terms = get_the_terms($post->ID, 'mark_label_cat');
$tags = [];
if($terms) foreach($terms as $term)array_push($tags, $term->slug);
if(in_array("newone",$tags)) print '<div class="product_list_sign2 red strong_f">NEW</div>';
if(in_array("recommend",$tags)) print '<div class="product_list_sign2 orange strong_f">おすすめ</div>';
if(in_array("goodone",$tags)) print '<div class="product_list_sign2 blue strong_f">美品</div>';
if(in_array("nowship",$tags)) print '<div class="product_list_sign2 green strong_f">即出荷</div>';
if(in_array("onsale",$tags)) print '<div class="product_list_sign2 srsd strong_f">商談中</div>';
if(in_array("condition",$tags)) print '<div class="product_list_sign2 gray strong_f">快適</div>';
?>
</div>
        </a>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<!--
<h1>★確認用★</h1>
<section id="recommend" class="section-style">
<div class="container2">
<h2 class="headline-title"><i class="fas fa-thumbs-up"></i> 新着商品|<span class="etc_new_com">おすすめ中古フォークリフト</span></h2>
<p class="recommend_etc_com">現在は「エンジン式」「ハイマスト」の商品を特におすすめしております。<br>
その他の商品も是非細部まで情報をご確認ください。</p>

    <div class="products">
        <div class="product-card">
            <div class="product-content">
                <div class="product-catch">1.5tガソリン車、2019年製、標準マスト・オートマ車！！</div>
                <img src="https://www.srs-sales.com/wp-content/uploads/2025/07/KIMG20250627_140609734.jpg" alt="商品画像">
                <div class="product-title">トヨタ/1.5tガソリンフォークリフトトヨタ/1.5tガソリンフォークリフト</div>
                <div class="product-detail-group">
                    <div class="product-detail">メーカー</div>
                    <div class="product_list_info_data">トヨタ/02-8FGL15</div>
                    <div class="product-detail">商品番号</div>
                    <div class="product_list_info_data">8FGL18-68935</div>
                </div>
                <div class="product-price-group">
                    <div class="product-price-item">現状販売価格</div>
                    <div class="product-price-value">1,200,000円</div>
                    <div class="tax-price">(税込価格: 1,320,000円)</div>
                    <div class="product-price-item">メンテナンス込み価格</div>
                    <div class="product-price-value">1,380,000円</div>
                    <div class="tax-price">(税込価格: 1,518,000円)</div>
                </div>
            </div>
            <div class="product-tags">
                <div class="product_list_sign2 orange strong_f">おすすめ</div>
                <div class="product_list_sign2 orange strong_f">美品</div>
                <div class="product_list_sign2 orange strong_f">即時出荷</div>
            </div>
        </div>
    </div>
</div>
</section>
-->


<section id="merit" class="section-style meritbox">
<div class="container2">

<h2 class="headline-title"><i class="fas fa-users"></i> 当社の強みと選ばれる理由</h2>

<div class="headline-section blue scroll-animate rotate-in">
  <div class="headline-subtitle">ＳＲＳの中古フォークリフトなら間違いなし！</div>
  <div class="headline-main">ＳＲＳの「中古フォークリフト」が選ばれる４つの理由</div>
</div>

<div class="merits">
  <!-- MERIT 01 -->
  <div class="merit scroll-animate rotate-in">
    <span class="merit-circle">
      <strong class="merit-num">01</strong>
      <span class="merit-label">MERIT</span>
    </span>

    <div class="merit-body">
      <h3 class="merit-title">厳選された高品質在庫</h3>
      <p>
        当社では、厳しい品質基準をクリアした中古フォークリフトのみを取り扱っています。
        専門技術者による徹底整備で最高のコンディションをご提供。
        <br><small>※現状販売車両は点検のみ。</small>
      </p>
    </div>

    <div class="merit-image">
      <img src="https://www.srs-sales.com/wp-content/themes/srssales/images/etc_sh_01.jpg" alt="厳選された高品質在庫">
    </div>
  </div>

  <!-- MERIT 02 -->
  <div class="merit scroll-animate rotate-in">
    <span class="merit-circle">
      <strong class="merit-num">02</strong>
      <span class="merit-label">MERIT</span>
    </span>

    <div class="merit-body">
      <h3 class="merit-title">現車確認・試乗可能</h3>
      <p>すべての中古フォークリフトで現車確認・試乗が可能。納得してご購入いただけます。</p>
    </div>

    <div class="merit-image">
      <img src="https://www.srs-sales.com/wp-content/themes/srssales/images/etc_sh_02.jpg" alt="現車確認・試乗可能">
    </div>
  </div>

  <!-- MERIT 03 -->
  <div class="merit scroll-animate rotate-in">
    <span class="merit-circle">
      <strong class="merit-num">03</strong>
      <span class="merit-label">MERIT</span>
    </span>

    <div class="merit-body">
      <h3 class="merit-title">圧倒的なコストパフォーマンス</h3>
      <p>コストを抑えつつ必要機能を満たす最適提案。用途に応じた幅広い選択肢。</p>
    </div>

    <div class="merit-image">
      <img src="https://www.srs-sales.com/wp-content/themes/srssales/images/etc_sh_03.jpg" alt="圧倒的なコストパフォーマンス">
    </div>
  </div>

  <!-- MERIT 04 -->
  <div class="merit scroll-animate rotate-in">
    <span class="merit-circle">
      <strong class="merit-num">04</strong>
      <span class="merit-label">MERIT</span>
    </span>

    <div class="merit-body">
      <h3 class="merit-title">購入方法を柔軟に選択</h3>
      <p>現状有姿販売・メンテナンス販売など、お客様の予算と用途に合わせた購入方法をご提案。</p>
    </div>

    <div class="merit-image">
      <img src="https://www.srs-sales.com/wp-content/themes/srssales/images/etc_sh_04.jpg" alt="購入方法を柔軟に選択">
    </div>
  </div>
</div>

</div>
</section>

<section id="etc_flow" class="section-style">
<div class="container2">

<h2 class="headline-title"><i class="fas fa-shopping-cart"></i> ご購入の流れ</h2>

<div class="headline-section blue scroll-animate rotate-in">
  <div class="headline-main">お問い合わせから納品まで<span class="highlight">手間ナシ</span></div>
  <div class="headline-subtitle">まずはお気軽にご希望をお聞かせください！</div>
</div>


<!-------->
<div class="etc_flow_inner">

              <div class="etc_flow_boxes">
                <div class="sectionFlow_inner">
                  <p class="sectionFlow_h">
			<img src="<?php echo get_template_directory_uri();?>/img/top/etc_flow01.png" alt="アイコン" class="sectionFlow_icon_img">車両選定</p>
                  <div class="sectionFlow_icon">
                    <p class="sectionFlow_icon_txt">STEP</p>
                    <p class="sectionFlow_icon_no">1</p>
                  </div>
                  <div class="sectionFlow_txts">
                    <p class="sectionFlow_txt -list -circle_blue">ご購入を希望する車両の紹介ページにある「お問い合わせ」フォームからメールを送信してください。<br>
または、車両紹介ページ下部に記載されている電話連絡先にお電話をお願いいたします。</p>
                  </div>
                </div>
              </div>

              <div class="etc_flow_boxes">
                <div class="sectionFlow_inner">
                  <p class="sectionFlow_h">
			<img src="<?php echo get_template_directory_uri();?>/img/top/etc_flow02.png" alt="アイコン" class="sectionFlow_icon_img">御見積書作成</p>
                  <div class="sectionFlow_icon">
                    <p class="sectionFlow_icon_txt">STEP</p>
                    <p class="sectionFlow_icon_no">2</p>
                  </div>
                  <div class="sectionFlow_txts">
                    <p class="sectionFlow_txt -list -circle_blue">こちらから折り返しのご連絡をさせていただき、ご希望の仕様・納車先・希望オプションの有無、販売方法等の詳細を確認いたします。<br>
そのうえで御見積書を作成いたします。</p>
                  </div>
                </div>
              </div>


      
        <div class="etc_flow_boxes">
                <div class="sectionFlow_inner">
                  <p class="sectionFlow_h">
			<img src="<?php echo get_template_directory_uri();?>/img/top/etc_flow03.png" alt="アイコン" class="sectionFlow_icon_img">ご成約</p>
                  <div class="sectionFlow_icon">
                    <p class="sectionFlow_icon_txt">STEP</p>
                    <p class="sectionFlow_icon_no">3</p>
                  </div>
                  <div class="sectionFlow_txts">
                    <p class="sectionFlow_txt -list -circle_blue">注文確認書を作成いたしますので、ご署名・ご捺印の上で返送をお願いいたします。<br>
注文確認書の返送と、ご入金確認が取れた時点でご成約となります。</p>
                  </div>
                </div>
              </div>
              <div class="etc_flow_boxes">
                <div class="sectionFlow_inner">
                  <p class="sectionFlow_h">
			<img src="<?php echo get_template_directory_uri();?>/img/top/etc_flow04.png" alt="アイコン" class="sectionFlow_icon_img">納車</p>
                  <div class="sectionFlow_icon">
                    <p class="sectionFlow_icon_txt">STEP</p>
                    <p class="sectionFlow_icon_no">4</p>
                  </div>
                  <div class="sectionFlow_txts">
                    <p class="sectionFlow_txt -list -circle_blue">ご成約後に整備スケジュールを確認の上、納車日の打ち合わせをさせていただきます。</p>
                  </div>
                </div>
              </div>
</div>



</div>
</section>


<section id="etc_faq" class="section-style">
<div class="container2">
<h2 class="headline-title"><i class="fas fa-question-circle"></i> よくあるご質問</h2>
<div class="etc_faq_inner">
<details open="">
  <summary><span class="ico"></span>購入後の保証はありますか</summary>
<div class="inner">ご納車直後(納車後1週間以内)の初期不具合については、故障内容により修理手配させていただきます。</div>
</details>
<details>
  <summary><span class="ico"></span>支払いのタイミングを教えてください</summary>
<div class="inner">購入のご判断をいただけたところで、事前のお支払いをお願いしております。</div>
</details>
<details>
  <summary><span class="ico"></span>車両を押さえることは出来ますか</summary>
<div class="inner">中古販売につき車両の押さえは基本的にご遠慮いただいております。<br>特例として社内稟議等で時間を要す場合には、注文書をいただくことで1週間程度の予約には対応しております。</div>
</details>
<details>
  <summary><span class="ico"></span>車両の詳しい状態を知りたい</summary>
<div class="inner">当社整備士が状態確認をしておりますので、メンテナンス箇所についてお伝え可能です。<br>また全車両、現車確認・試乗可能となっておりますので、実機を確認しながらの説明もお受けいたします。</div>
</details>
<details>
  <summary><span class="ico"></span>納期を教えてください</summary>
<div class="inner">ご成約後2週間程度が目安となっておりますが、交換部品の納期により異なる場合がございます。</div>
</details>
<details>
  <summary><span class="ico"></span>何年ぐらい使えますか</summary>
<div class="inner">フォークリフトは純正部品に加えジェネリック部品も多く、1980年代の車両も現役で活躍しております。<br>中古フォークリフトでもメンテナンス次第で長期運用可能です。</div>
</details>
<details>
  <summary><span class="ico"></span>納車後のキャンセルは出来ますか</summary>
<div class="inner">ご成約後のキャンセルについてはご対応いたしかねます。</div>
</details>
</div>

</div>
</section>

<section id="news" class="section-style">
<div class="container2 info">
<h2 class="headline-title"><i class="fas fa-bullhorn"></i> お知らせ</h2>
	<div class="box_inner">
		
<ul id="news-list">
<?php
$query = new WP_Query(array(
  'post_type' => 'news',
  'posts_per_page' => 5,
  'tax_query' => array(
    array(
      'taxonomy' => 'products_cat',
      'field' => 'slug',
      'terms' => 'products_etc'
    )
  ),
  'orderby' => 'date',
  'order' => 'DESC'
));
while($query->have_posts()) : $query->the_post();
?>
  <li><span class="date"><?php the_time("Y年m月d日 l  "); ?></span><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
</ul>
<div class="text_c pdg_btm20 white_bg"><a href="<?php echo esc_url( home_url( '/newsarch/' ) ); ?>" class="btn btn_s srsi"><i class="fas fa-search"></i> 一覧を見る</a></div>
	</div>
</div>
</section>


<h1>★確認用★</h1>
<section id="news" class="section-style">
<div class="container2 info">

<h2 class="headline-title"><i class="fas fa-bullhorn"></i> お知らせ</h2>
	<div class="box_inner">
		
		<ul id="news-list">
			<li><span class="date">2025年06月16日 月曜日  </span><a href="https://www.srs-sales.com/archives/news/2025-06-16_16681">【新規コンテンツ公開】SRSのご紹介</a></li>
			<li><span class="date">2025年04月22日 火曜日  </span><a href="https://www.srs-sales.com/archives/news/2025-04-22_16299">amazonギフトカードプレゼントキャンペーン実施中！！</a></li>
			<li><span class="date">2025年04月16日 水曜日  </span><a href="https://www.srs-sales.com/archives/news/2025-04-16_16292">LINE公式アカウント 友だち募集中！</a></li>
			<li><span class="date">2025年03月07日 金曜日  </span><a href="https://www.srs-sales.com/archives/news/2025-03-07_16002">【働きかた改革】による土日休業実施のお知らせ</a></li>
			<li><span class="date">2024年11月06日 水曜日  </span><a href="https://www.srs-sales.com/archives/news/2024-11-06_15618">新入荷情報│三菱/2.5tディーゼルフォークリフトが入荷しました！</a></li>
		</ul>	
	</div>
</div>
</section>




<section id="info" class="section-style">
<div class="container2">
<h2 class="headline-title"><i class="fas fa-info-circle"></i> ご案内</h2>

<div class="list-c2">
	<div class="list image1">
		<div class="text">
		<h4><span class="sub-text">イベント情報</span><span class="main-text">Events</span></h4>
		<p class="btn1 round_arrow"><a href="/info/events/"><span>詳細はこちら</span></a></p>
		</div>
	</div>
<!--	<div class="list image1">

		<div class="text">
		<h4><span class="sub-text">■■■■■</span><span class="main-text">■■■■■</span></h4>
		<p class="btn1 round_arrow"><a href="precinct.html"><span>詳細はこちら</span></a></p>
		</div>

	</div>
	<div class="list image1">
		<div class="text">
		<h4><span class="sub-text">■■■■■</span><span class="main-text">■■■■■</span></h4>
		<p class="btn1 round_arrow"><a href="precinct.html"><span>詳細はこちら</span></a></p>
		</div>
	</div>
-->
</div>

</div>
</section>

<section id="guide" class="section-style">
<div class="container2">
<h2 class="headline-title"><i class="fas fa-compass"></i> ご利用ガイド</h2>


<ul id="othr-guide" class="guidance-list">
    <li class="guidance-item">
        <h3 class="guidance-title">初めての方へ</h3>
        <p>初めてご利用される方のために、このウェブサイトについて、わかりやすくご説明いたします。</p>
        <a href="/guide/beginner/" class="guidance-link">詳細を見る</a>
    </li>
    <li class="guidance-item">
        <h3 class="guidance-title">ご購入の流れ</h3>
        <p>車両選定から納車までの流れを、4つのステップに分けて詳しくご説明します。</p>
        <a href="/guide/flow" class="guidance-link">詳細を見る</a>
    </li>
    <li class="guidance-item">
        <h3 class="guidance-title">SRSのご紹介</h3>
        <p>当社は「お客さまの心に残る伝説のサービス」を掲げ、安全で効率的な作業環境と社会インフラに貢献することを目指す会社です。</p>
        <a href="/guide/appeal" class="guidance-link">詳細を見る</a>
    </li>
</ul>


</div>
</section>

<?php get_footer(); ?>

