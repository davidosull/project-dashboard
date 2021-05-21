<?php

// ACF options
if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'  => 'Site Options',
    'menu_title' => 'Site Options',
    'menu_slug'  => 'site-options',
    'capability' => 'edit_posts',
    'redirect'  => false
  ));
}

// Google Maps API Key
function my_acf_init()
{
  $api_key = get_field('google_maps_api', 'option');

  acf_update_setting('google_api_key', $api_key);
}
add_action('acf/init', 'my_acf_init');


/*
Use ACF with responsive image features in WordPress core
https://awesomeacf.com/responsive-images-wordpress-acf

Additions:
* Lazy loading for Chrome
https://web.dev/native-lazy-loading

* Width and height attributes to assist with layout during loading
https://groups.google.com/a/chromium.org/forum/#!topic/blink-dev/hbhKRuBzZ4o
*/

function acf_responsive_image($image_id, $image_size, $max_width)
{

  if ($image_id) :

    // Set default src image size
    $image_src = wp_get_attachment_image_url($image_id, $image_size);

    // Set srcset with various image sizes (that have the same aspect ratio)
    $image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);

    // Image dimensions from image size e.g. 200x100
    $image_dimensions = explode("x", $image_size);

    // Markup for the responsive image
    echo 'src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '" width="' . $image_dimensions[0] . '" height="' . $image_dimensions[1] . '" loading="lazy"';
  endif;
}
