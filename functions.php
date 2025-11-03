<?php
//

/* global-styles-inline-cssを排除 */
add_action('wp_enqueue_scripts', 'remove_global_styles_inline');
function remove_global_styles_inline() {
wp_dequeue_style('remove_global-styles_inline');
}
//謎のp非表示
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
add_filter('language_attributes', function($output) {
    return str_replace(' /', '', $output);
});
//謎のスラッシュ非表示
// WordPressヘッダー出力からスラッシュを削除
add_action('template_redirect', function() {
    ob_start(function($output) {
        // 自動生成される末尾スラッシュを削除
        return str_replace(' />', '>', $output);
    });
});

add_action('shutdown', function() {
    if (ob_get_level() > 0) {
        ob_end_flush();
    }
});
//最終手段bloceditorCSS無効
if ( !function_exists( 'disable_block_editer_css' ) ){
    function disable_block_editer_css() {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('global-styles');
        wp_dequeue_style('classic-theme-styles');
    }
    add_action('wp_enqueue_scripts', 'disable_block_editer_css');
}
// 税率定数
if ( ! defined('TAX_RATIO') ) {
    define('TAX_RATIO', 1.1);
}

// doc_link 関数ダミー定義（Fatal回避用）
if ( ! function_exists('doc_link') ) {
    function doc_link($field_name) {
        $url = get_field($field_name);
        if($url) {
            return '<a href="' . esc_url($url) . '" target="_blank">資料を見る</a>';
        }
        return '';
    }
}
//ダミー定義（Fatal回避用）
function mydropdown_taxsonomy($taxonomy) {
  $terms = get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
  ));

  if (!empty($terms) && !is_wp_error($terms)) {
    echo '<select name="' . esc_attr($taxonomy) . '">';
    echo '<option value="0">–</option>';
    foreach ($terms as $term) {
      echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
    }
    echo '</select>';
  }
}
//yamada add
/**
 * メインサイトを参照する設定
 */
$wpdb_main = null;
$wpdb_fork = null;
function init_wpdb() {
    global $wpdb, $wpdb_main, $wpdb_fork;
    $wpdb_main = new wpdb( DB_USER_MAIN, DB_PASSWORD_MAIN, DB_NAME_MAIN, DB_HOST_MAIN );
    $wpdb_fork = $wpdb;
}
function set_dbprefix_main() {
    global $wpdb, $wpdb_main, $wpdb_fork;
    if( is_null($wpdb_main) || is_null($wpdb_fork) ){
        init_wpdb();
    }
    $wpdb = $wpdb_main;
    $wpdb->set_prefix(DBPREFIX_MAIN);
}

function set_dbprefix_fork() {
    global $wpdb, $wpdb_main, $wpdb_fork;
    if( is_null($wpdb_main) || is_null($wpdb_fork) ){
        init_wpdb();
    }
    $wpdb = $wpdb_fork;
    $wpdb->set_prefix(DBPREFIX_FORK);
}

function query_for_taxonomy($mypost_type,$mytaxlist,$mymetalist){
  global $authors_kyusyu;
  $args = array(
    'post_type' => $mypost_type,
    'author__in' => $authors_kyusyu, // 九州地区の投稿者に限定
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
