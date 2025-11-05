<?php
/*
Template Name: 商品検索-etc-search
*/
?>
<?php get_header(); ?>
<?php set_dbprefix_main(); ?>
<?php get_template_part('global_menu'); ?>
<?php
function my_checkbox_list_taxonomy($mytax_name){
  $mytax = $mytax_name;
  $selected = get_query_var($mytax);
  $items = array();
  if(!is_array($selected)){
    array_push($items, $selected);
  }else{
    $items = array_merge($items,$selected);
  }
  $checked = in_array("0", $items) ? 'checked' : '';
  print('<input type="checkbox" id="' . $mytax . '_all" ' . $checked . '/> <label for="size_all" class="unit_t strong_f big mdl">すべて選択</label>');
  print('<ul class="choices clearfix">');
  $tags = get_terms($mytax, array('hide_empty' => false, 'orderby' => 'id'));
  //yamada debug work
  global $wpdb;
  echo '<Pre>';
  print_r( get_taxonomies());
  //print_r( $wpdb->get_results("SELECT * FROM $wpdb->terms") );
  print_r($mytax);
  //print_r($tags);
  echo '</Pre>';
  //end of work
  $checkboxes = '';
  foreach($tags as $tag) :
    if(in_array("0", $items)){
      $checked = 'checked';
    }else{
      $checked = (in_array($tag->slug,$items)) ? 'checked' : '';
    }
    $checkboxes .= '<li><input type="checkbox" name="' . $mytax . '[]" value="' . $tag->slug . '" id="' . $mytax . '-' . $tag->term_id . '" ' . $checked . '/>';
    $checkboxes .= '<label for="' . $mytax . '-' . $tag->slug . '">' . $tag->name . '</label></li>';
  endforeach;
  print $checkboxes;
  echo '</ul>';
}
?>

<?php if ( function_exists( 'bcn_display' ) ) : ?>
  <div class="breadcrumb-wrap">
    <nav class="breadcrumb" aria-label="パンくずリスト">
      <?php bcn_display(); ?>
    </nav>
  </div>
<?php endif; ?>


<main>
<div class="container2">

<section class="search-list">
<!-- ?php
  $args = query_for_taxonomy('etc', array('etc_class_cat', 'etc_type_cat', 'etc_mast_cat','etc_price_range_cat','etc_model_cat','etc_time_cat'),array('req'));
  $wp_query = new WP_query();
  $wp_query->query($args);
? -->
  <h2 class="headline-title2"><i class="fas fa-search"></i> フォークリフト・その他商品を探す</h2>

  <form class="esf-form" method="get" action="/etc-result">

    <!-- クラス(トン数) -->
<div class="chk-block">
  <h3 class="chk-title">クラス(トン数)</h3>
  <ul class="chk">
    <li>
      <ul class="subchk">
        <?php
          wp_reset_query();
          my_checkbox_list_taxonomy('etc_class_cat');
        ?>
      </ul>
    </li>
  </ul>
  <div class="btnb">
    <button type="submit" class="btn"><i class="fas fa-search"></i> この条件で探す</button>
  </div>
</div>


<!-- タイプ(動力) -->
<div class="chk-block">
  <h3 class="chk-title">タイプ(動力)で探す</h3>
  <ul class="chk">
    <li>
      <ul class="subchk">
        <?php
          wp_reset_query();
          my_checkbox_list_taxonomy('etc_type_cat');
        ?>
      </ul>
    </li>
  </ul>
  <div class="btnb">
    <button type="submit" class="btn"><i class="fas fa-search"></i> この条件で探す</button>
  </div>
</div>

<!-- マストで探す -->
<div class="chk-block">
  <h3 class="chk-title">マストで探す</h3>
  <ul class="chk">
    <li>
      <ul class="subchk">
        <?php
          wp_reset_query();
          my_checkbox_list_taxonomy('etc_mast_cat');
        ?>
      </ul>
    </li>
  </ul>
  <div class="btnb">
    <button type="submit" class="btn"><i class="fas fa-search"></i> この条件で探す</button>
  </div>
</div>

<!-- 価格 -->
<div class="chk-block">
  <h3 class="chk-title">価格で探す</h3>
  <ul class="chk">
    <li>
      <ul class="subchk">
        <?php
          wp_reset_query();
          my_checkbox_list_taxonomy('etc_price_range_cat');
        ?>
      </ul>
    </li>
  </ul>
  <div class="btnb">
    <button type="submit" class="btn"><i class="fas fa-search"></i> この条件で探す</button>
  </div>
</div>

<!-- 年式 -->
<div class="chk-block">
  <h3 class="chk-title">年式で探す</h3>
  <ul class="chk">
    <li>
      <ul class="subchk">
        <?php
          wp_reset_query();
          my_checkbox_list_taxonomy('etc_model_cat');
        ?>
      </ul>
    </li>
  </ul>
  <div class="btnb">
    <button type="submit" class="btn"><i class="fas fa-search"></i> この条件で探す</button>
  </div>
</div>

<!-- 稼働時間 -->
<div class="chk-block">
  <h3 class="chk-title">稼働時間で探す</h3>
  <ul class="chk">
    <li>
      <ul class="subchk">
        <?php
          wp_reset_query();
          my_checkbox_list_taxonomy('etc_time_cat');
        ?>
      </ul>
    </li>
  </ul>
  <div class="btnb">
    <button type="submit" class="btn"><i class="fas fa-search"></i> この条件で探す</button>
  </div>
</div>

  </form>

<div id="text-search-section" class="text-search">
  <h3><i class="fas fa-keyboard"></i> テキストで検索</h3>

  <form class="text-search-box" method="get" action="<?php echo home_url(); ?>">
    <input type="hidden" name="post_type" value="etc">
    <input type="text" name="s" placeholder="キーワードを入力してください" style="height: 80px;">
    <button type="submit" class="btn"><i class="fas fa-search"></i> キーワード検索</button>
  </form>
</div>
</section>
</div>
</main>

<?php get_footer(); ?>
<script>
document.getElementById('etc_class_cat_all').addEventListener('change', function() {
  const checkboxes = document.querySelectorAll('.subchk input[type="checkbox"]');
  checkboxes.forEach(cb => cb.checked = this.checked);
});
</script>
