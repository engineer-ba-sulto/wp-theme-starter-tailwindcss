<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <!-- header.phpを読み込む -->
  <meta charset="<?php bloginfo("charset"); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php get_template_part("template-parts/meta-tags"); ?>
  <!-- 
Markdown形式のコンテンツをウェブページ上で美しく表示するために設計されています。
特に、GitHubのリポジトリやドキュメントで使用されるMarkdownのスタイルを再現することを目的としています。
- 一貫したデザイン: GitHub Markdown CSSを使用することで、Markdownコンテンツが一貫したスタイルで表示され、ユーザーにとって視覚的に魅力的な体験を提供します。
- 簡単な統合: WordPressでは、カスタムCSSを簡単に追加できるため、このスタイルシートをテーマやプラグインに組み込むことが容易です。
- オープンソース: GitHub Markdown CSSはオープンソースであり、誰でも自由に使用・改変できるため、コストをかけずに高品質なデザインを実現できます。
- レスポンシブデザイン: このCSSはレスポンシブデザインに対応しており、さまざまなデバイスで適切に表示されます。
-->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/2.10.0/github-markdown.css"> -->
  <!-- 
Remix Iconフォントを使用するために必要なスタイルシート 
- アイコンの利用: Remix Iconは、さまざまなデザインニーズに対応する多様なアイコンセットを提供します。
	これにより、ウェブサイトやアプリケーションの視覚的な魅力を高めることができます。
- 簡単な統合: CSSファイルをWordPressテーマに追加することで、簡単にアイコンを使用できます。特別な設定や複雑な手順は不要です。
- カスタマイズ性: Remix Iconは、サイズや色をCSSで簡単に変更できるため、デザインの一貫性を保ちながら、必要に応じて調整が可能です。
- 軽量: このアイコンセットは軽量であり、ページの読み込み速度に悪影響を与えません。これにより、ユーザーエクスペリエンスが向上します。
- オープンソース: Remix Iconはオープンソースであり、無料で使用できるため、コストを抑えつつ高品質なデザイン要素を取り入れることができます。
-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" />
  <title><?php echo esc_html(wp_get_document_title()); ?></title>
  <?php wp_head(); ?>
</head>

<body>
  <?php wp_body_open(); ?>
  <?php get_template_part("template-parts/header-content"); ?>
  <main>