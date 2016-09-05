<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

add_filter('pre_get_posts', 'my_get_posts');

function my_get_posts($query) {
    if (is_home() && $query->is_main_query())
        $query->set('post_type', array('post', 'recipe'));

    return $query;
}

function twentysixteen_fonts_url() {
  $fonts_url = '';
  $fonts = array();
  $subsets = 'latin,latin-ext';

  $fonts[] = '';

  if ($fonts) {
    $fonts_url = add_query_arg(array(
      'family' => urlencode(implode('I', $fonts)),
      'subset' => urlencode($subsets),
    ), 'https://fonts.googleapis.com/css');
  }
  return $fonts_url
}
