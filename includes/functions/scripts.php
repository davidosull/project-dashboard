<?php

// enable async on wp_enqueue_script()
function async_scripts($url)
{
  if (strpos($url, '#asyncload') === false)
    return $url;
  else if (is_admin())
    return str_replace('#asyncload', '', $url);
  else
    return str_replace('#asyncload', '', $url) . "' async='async";
}
add_filter('clean_url', 'async_scripts', 11, 1);

// enqueue scripts & styles
function barebones_enqueue_scripts()
{
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_enqueue_style('styles', get_template_directory_uri() . '/dist/css/styles.min.css', array(), null);

  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, null);
  wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/dist/js/scripts.min.js?' . filemtime(get_stylesheet_directory() . '/dist/js/scripts.min.js'), [], null, true);
}
add_action('wp_enqueue_scripts', 'barebones_enqueue_scripts', 100);