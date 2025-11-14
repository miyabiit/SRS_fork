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
//yamada add
// ドロップダウンメニュー(単独検索）
function _mydropdown_taxsonomy($taxonomy) {
  $terms = get_terms(array(
    'taxonomy'   => $taxonomy,
    'hide_empty' => false,
    'orderby'    => 'slug',
    'order'      => 'ASC'
  ));

  if (!empty($terms) && !is_wp_error($terms)) {
    // 現在のURL（ベースURL）を取得
    $base_url = esc_url( home_url('/etc-result') );

    echo '<select name="' . esc_attr($taxonomy) . '" id="' . esc_attr($taxonomy) . '" 
          onchange="if(this.value) window.location.href=\'' . $base_url . '?' . esc_attr($taxonomy) . '=\'+this.value;">';
    echo '<option value="">– 選択してください –</option>';

    foreach ($terms as $term) {
      echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
    }

    echo '</select>';
  }
}
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
// ① init の超早い段階で DB を main に切り替える
add_action('init', function() {
    $uri = $_SERVER['REQUEST_URI'];

    if (preg_match('#^/archives/news/#', $uri)) {
        set_dbprefix_main();
    }
    global $wpdb;
    console_log('[init] prefix=' . $wpdb->prefix);

    if (preg_match('#^/archives/etc/#', $uri)) {
        set_dbprefix_main();
    }

}, 1); // ← 優先度1（最も早く実行）

// ② カスタム投稿タイプ登録（優先度10＝通常のタイミング）
add_action('init', function() {
    register_post_type('etc', [
        'label' => 'forklift',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'etc'],
        'show_ui' => true,
    ]);
    register_post_type('news', [
        'label' => 'お知らせ',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'news'],
        'show_ui' => true,
    ]);

    $taxonomies = [
        'etc_class_cat', 'etc_type_cat', 'etc_mast_cat',
        'etc_price_range_cat', 'etc_model_cat', 'etc_time_cat',
        'mark_label_cat','products_cat'
    ];
    foreach ($taxonomies as $tax) {
        register_taxonomy($tax, null, [
            'hierarchical' => true,
            'public' => true,
            'query_var' => true,
        ]);
    }
}, 10);
/*
// カスタム投稿タイプ登録
add_action('init', function() {
    register_post_type('etc', [
        'label' => 'forklift',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'etc'],
        'show_ui' => true,
    ]);
    register_post_type('news', [
        'label' => 'お知らせ',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'news'],
        'show_ui' => true,
    ]);
    $taxonomies = [
        'etc_class_cat', 'etc_type_cat', 'etc_mast_cat',
        'etc_price_range_cat', 'etc_model_cat', 'etc_time_cat',
        'mark_label_cat','products_cat'
    ];
    foreach ($taxonomies as $tax) {
        register_taxonomy($tax, null, [
            'hierarchical' => true,
            'public' => true,
            'query_var' => true,
        ]);
    }
});
// 個別投稿ページが404エラーにならないように'parse_request'のタイミングでdb切り替え
add_action('parse_request', function($wp) {
    // /news/slug/
    if (strpos($wp->request, 'news/') === 0) {
        set_dbprefix_main();
    }
    if (strpos($wp->request, 'etc/') === 0) {
        set_dbprefix_main();
    }
});
// 個別投稿ページが404エラーにならないように'pre_get_posts'のタイミングでdb切り替え
function change_posts_query($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
    if( isset($query->query['post_type']) && ($query->query['post_type']==='news' || $query->query['post_type']==='etc' || $query->query['post_type']==='office') ){
        set_dbprefix_main();
    }
}
add_action( 'pre_get_posts', 'change_posts_query' );
 */

// for debug
if (!function_exists('dd')) {
    function dd($var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die(); // ここで処理を止める
    }
}
function console_log($data) {
    echo "<script>console.log(" . json_encode($data) . ");</script>";
}
/*
add_action('parse_request', function($wp) {
    console_log('[parse_request] request=' . $wp->request);
    global $wpdb;
    console_log('[parse_request] prefix=' . $wpdb->prefix);
});
 */
?>
