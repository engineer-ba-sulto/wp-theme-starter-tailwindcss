<?php

/**
 * メタタグテンプレートパーツ
 *
 * SEO対策用のメタタグを動的に生成します
 *
 * @package wp-theme-starter-tailwindcss
 */

// 基本情報を取得
$site_name = get_bloginfo("name");
$site_description = get_bloginfo("description");
$site_url = home_url();

// ページタイプに応じた情報を取得
if (is_single() || is_page()) {
  // 投稿・固定ページの場合
  $page_title = get_the_title();
  $page_description = get_the_excerpt()
    ? get_the_excerpt()
    : wp_trim_words(get_the_content(), 30);
  $page_url = get_permalink();
  $page_image = get_the_post_thumbnail_url(null, "large") ?: "";
  $og_type = "article";
} elseif (is_home() || is_front_page()) {
  // ホームページの場合
  $page_title = $site_name;
  $page_description = $site_description;
  $page_url = $site_url;
  $page_image = "";
  $og_type = "website";
} else {
  // その他のページ（アーカイブなど）
  $page_title = wp_get_document_title();
  $page_description = $site_description;
  $page_url = $site_url . $_SERVER["REQUEST_URI"];
  $page_image = "";
  $og_type = "website";
}

// タイトルをエスケープ
$page_title = esc_attr($page_title);
$page_description = esc_attr($page_description);
$page_url = esc_url($page_url);
$page_image = esc_url($page_image);
$site_name = esc_attr($site_name);
?>
<!-- SEO対策 -->
<meta name="description" content="<?php echo $page_description; ?>" />
<meta property="og:title" content="<?php echo $page_title; ?>" />
<meta property="og:description" content="<?php echo $page_description; ?>" />
<meta property="og:type" content="<?php echo $og_type; ?>" />
<meta property="og:url" content="<?php echo $page_url; ?>" />
<?php if ($page_image): ?>
  <meta property="og:image" content="<?php echo $page_image; ?>" />
<?php endif; ?>
<meta property="og:site_name" content="<?php echo $site_name; ?>" />
<meta property="og:locale" content="ja_JP" />
<!-- SEO対策 終了-->