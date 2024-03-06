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

  // エディタースタイル
  add_theme_support('editor-styles');
  add_editor_style('assets/css/editor-style.css');

  add_theme_support('widgets');
  add_theme_support('automatic-feed-links');
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


function my_allowed_block_types_all($allowed_blocks, $editor_context)
{
  $allowed_blocks = [
    'core/heading',
    'core/paragraph',
    'core/list',
  ];

  // 固定ページ(画像ブロックを追加)
  if ($editor_context->post->post_type === 'page') {
    $allowed_blocks[] = 'core/image';
  }

  return $allowed_blocks;
}
// add_filter('allowed_block_types_all', 'my_allowed_block_types_all', 10, 2);

/**
 * 管理者権限を操作する
 *
 * @return void
 */
function my_admin_init()
{
  // 管理者権限の取得（オブジェクト）
  $role = get_role('administrator');

  // 権限の追加
  $role->add_cap('edit_others_foods');
  $role->add_cap('edit_foods');
  $role->add_cap('edit_private_foods');
  $role->add_cap('edit_published_foods');
  $role->add_cap('publish_foods');
  $role->add_cap('read_private_foods');
  // $role->add_cap('delete_others_foods');
  // $role->add_cap('delete_foods');
  // $role->add_cap('delete_private_foods');
  // $role->add_cap('delete_published_foods');

  // 権限の削除
  $role->remove_cap('delete_others_foods');
  $role->remove_cap('delete_foods');
  $role->remove_cap('delete_private_foods');
  $role->remove_cap('delete_published_foods');
}
add_action('admin_init', 'my_admin_init');


/**
 * Var dump with pre tag
 *
 * @param mixed $content
 * @return void
 */
function my_dump($content)
{
  echo '<pre>';
  var_dump($content);
  echo '</pre>';
}
