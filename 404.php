<?php get_header(); ?>
<?php get_template_part('global_menu'); ?>
<main>
<div class="container2">

<article class="other">
<h2><span>404</span><span>Not Found</span></h2>

<p>お探しのページにアクセスできません (404 Not Found)。</p>
<p>ご不便をお掛けして申し訳ありません。</p>
<p>指定されたページは一時的にアクセスできない状態になっているか、URLが変更あるいは削除されたのかもしれません。</p>
<p>大変お手数ですが、トップページから改めてご覧になりたいコンテンツを選択してください。</p>
<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><font color="red">トップページをご覧になりたい場合には、こちらをクリックしてください。</font></a></p>
</article>

</div>
</main>
<?php get_footer(); ?>
