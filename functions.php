<?php
// 本ページ用にCSSとJavaScriptを読み込む
function add_theme_cssjs()
{
  // css/theme.cssを読み込む
  wp_enqueue_style("theme-style", get_theme_file_uri("/css/tailwind.css"));
}

add_action("wp_enqueue_scripts", "add_theme_cssjs");
