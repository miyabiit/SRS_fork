<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
<meta name="description" content="<?php
    if (is_page()) {
        echo get_post_meta(get_the_ID(), 'description', true);
    } else {
        echo '★★★';
    }
?>">
<meta name="keywords" content="<?php
    if (is_page()) {
        echo get_post_meta(get_the_ID(), 'keywords', true);
    } else {
        echo '★★★';
    }
?>">
<title>
<?php
if (is_front_page()) {
    echo 'SRSフォークリフトサイト';
} else {
    echo get_bloginfo('name') . ' | ' . wp_title('', false, 'right');
}
?>
</title>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/swiper-bundle.min.css">
	<link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri();?>/css/style01.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<script src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/js/style.js"></script>
<!-- Fancybox v5 読み込み -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<?php wp_head(); ?>
</head>
<body>







