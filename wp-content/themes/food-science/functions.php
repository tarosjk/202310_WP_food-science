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

  // html5の出力を行う
  add_theme_support('html5');

  add_theme_support('widgets');
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

/**
 * パスワード保護中の投稿タイトルの「保護中」を削除
 *
 * @return string
 */
function my_protected_title()
{
  return '%s';
}
add_filter('protected_title_format', 'my_protected_title');


function my_password_form()
{
  remove_filter('the_content', 'wpautop');

  $wp_login_url = wp_login_url();

  // ↓heredoc は $html = ""; とほぼ同義
  // 複数行にわたる文字列の作成に便利
  $html = <<<HTML
  <p>パスワードを入力して下さい。</p>
  <form action="{$wp_login_url}?action=postpass" method="post" class="post-password-form">
    <input type="password" name="post_password">
    <input type="submit" name="送信" value="送信">
  </form>
HTML;
  return $html;
}
add_filter('the_password_form', 'my_password_form');


/**
 * Var dump with pre tag
 *
 * @param mixed $content
 * @return void
 */
function my_dump($content) {
  echo '<pre>';
  var_dump($content);
  echo '</pre>';
}