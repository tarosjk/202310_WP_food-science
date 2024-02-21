<?php

/**
 * titleタグを出力する
 */
add_theme_support('title-tag');


function my_document_title_separator($separator)
{
  $separator = '|';
  return $separator;
}
add_filter('document_title_separator', 'my_document_title_separator');
