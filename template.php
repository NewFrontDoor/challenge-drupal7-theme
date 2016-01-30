<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
function challenge_preprocess_page(&$vars) {
  if (isset($vars['node']->type)) {
    if (!isset($vars['theme_hook_suggestions'])) {
      $vars['theme_hook_suggestions'] = array();
    }

    array_splice($vars['theme_hook_suggestions'], -1, 0, 'page__'.$vars['node']->type);
    $url_alias = drupal_get_path_alias($_GET['q']);
    $split_url = explode('/', $url_alias);

    $cumulative_path = '';
    foreach ($split_url as $path) {
      $cumulative_path .= '__' . $path;
      $path_name = 'page' . $cumulative_path;
      array_splice($vars['theme_hook_suggestions'], -1, 0, str_replace('-','_', $path_name));
    }

    if (count($split_url) > 0) {
      $vars['classes_array'][] = $split_url[0];
    }

    if (count($split_url) > 1) {
      $page_name = end($split_url);
      array_splice($vars['theme_hook_suggestions'], -1, 0, 'page__'.str_replace('-','_',$page_name));
    }
  }
}

function challenge_preprocess_html(&$vars) {
  $url_alias = drupal_get_path_alias($_GET['q']);
  $split_url = explode('/', $url_alias);

  if (count($split_url) > 0 && $split_url[0] != 'node') {
    $vars['classes_array'][] = 'challenge-'.$split_url[0];
  }
  if (count($split_url) > 1 && is_numeric($split_url[1]) && $split_url[0] != 'node') {
    $vars['classes_array'][] = 'challenge-'.$split_url[1];
  }
}
