<?php

/**
 * テーマの機能を追加する
 *
 * @return void
 */
function my_theme_support()
{
  // titleタグを出力する
  add_theme_support('title-tag');

  // アイキャッチ画像を有効化する
  add_theme_support('post-thumbnails');

  // カスタムメニューを作成する
  add_theme_support('menus');
}
add_action('after_setup_theme', 'my_theme_support');


function my_document_title_separator($separator)
{
  $separator = '|';
  return $separator;
}
add_filter('document_title_separator', 'my_document_title_separator');


/**
 * Contact Form 7 の自動整形をオフにする
 *
 * @return bool
 */
function my_wpcf7_autop()
{
  return false;
}
add_filter('wpcf7_autop_or_not', 'my_wpcf7_autop');


function my_pre_get_posts($query)
{
  if (is_admin() || !$query->is_main_query()) {
    return;
  }
  if ($query->is_home()) {
    $query->set('posts_per_page', 3);
    return;
  }
}
add_action('pre_get_posts', 'my_pre_get_posts');
