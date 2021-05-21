<?php

// partials
function inovo_partial($template, $args = array())
{
  extract($args);
  include TEMPLATEPATH . '/includes/partials/' . $template . '.php';
}

function inovo_section($section, $args = array())
{
  extract($args);
  include TEMPLATEPATH . '/includes/sections/' . $section . '.php';
}

// image sizes
add_image_size('1600x800', 1600, 800, false);
add_image_size('1200x600', 1200, 600, false);
add_image_size('800x400', 800, 400, false);
add_image_size('600x300', 600, 300, false);

add_image_size('800x800', 800, 800, false);
add_image_size('600x600', 600, 600, false);
add_image_size('400x400', 400, 400, false);
add_image_size('64x64', 64, 64, false);


/**
 * Register nav menus
 * @return void
 */

function barebones_register_nav_menus()
{
  register_nav_menus([
    'header'   => 'Header',
    'mobile'   => 'Mobile',
  ]);
}

add_action('after_setup_theme', 'barebones_register_nav_menus', 0);

/**
 * Nav menu args
 * @param array $args
 * @return void
 */

function barebones_nav_menu_args($args)
{
  $args['container']       = false;
  $args['container_class'] = false;
  $args['menu_id']         = false;
  $args['items_wrap']      = '<ul class="%2$s">%3$s</ul>';

  return $args;
}

add_filter('wp_nav_menu_args', 'barebones_nav_menu_args');

// Register Sidebars
function init_widgets()
{

  register_sidebar(array(
    'name'          => 'Post',
    'id'            => 'post_sidebar',
    'before_widget' => '<div class="sidebar">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="t__line">',
    'after_title'   => '</h4>',
  ));
}
add_action('widgets_init', 'init_widgets');

// Reduce excerpt length
add_filter('excerpt_length', function ($length) {
  return 32;
});


/**Function to change the default `wp-login.php` with your custom login page **/
add_filter('login_url', 'new_login_page', 10, 3);
function new_login_page($login_url, $redirect, $force_reauth)
{
  $login_page = home_url(); //use the slug of your custom login page.
  return add_query_arg('redirect_to', $redirect, $login_page);
  exit;
}