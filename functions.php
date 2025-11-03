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

?>
