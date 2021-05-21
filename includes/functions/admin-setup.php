<?php

/**
 * Add support for useful stuff
 */

if (function_exists('add_theme_support')) {

  // Add support for document title tag
  add_theme_support('title-tag');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  // add_image_size( 'custom-size', 700, 200, true );

  // Add Support for post formats
  // add_theme_support( 'post-formats', ['post'] );
  // add_post_type_support( 'page', 'excerpt' );

  // Localisation Support
  load_theme_textdomain('barebones', get_template_directory() . '/languages');
}


/**
 * Hide admin bar
 */

add_filter('show_admin_bar', '__return_false');


/**
 * Remove junk
 */

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/**
 * Remove comments feed
 *
 * @return void
 */

function barebones_post_comments_feed_link()
{
  return;
}

add_filter('post_comments_feed_link', 'barebones_post_comments_feed_link');


/**
 * Button Shortcode
 *
 * @param array $atts
 * @param string $content
 * @return void
 */

function barebones_button_shortcode($atts, $content = null)
{
  $atts['class'] = isset($atts['class']) ? $atts['class'] : 'btn';
  return '<a class="' . $atts['class'] . '" href="' . $atts['link'] . '">' . $content . '</a>';
}

add_shortcode('button', 'barebones_button_shortcode');


/**
 * TinyMCE
 *
 * @param array $buttons
 * @return void
 */

function barebones_mce_buttons_2($buttons)
{
  array_unshift($buttons, 'styleselect');
  $buttons[] = 'hr';

  return $buttons;
}

add_filter('mce_buttons_2', 'barebones_mce_buttons_2');


/**
 * TinyMCE styling
 *
 * @param array $settings
 * @return void
 */

function barebones_tiny_mce_before_init($settings)
{
  $style_formats = [
    // [
    // 'title' => '',
    // 'selector' => '',
    // 'classes' => ''
    // ],
    // [
    // 'title' => 'Buttons',
    // 'items' => [
    // [
    // 'title' => 'Primary',
    // 'selector' => 'a',
    // 'classes' => 'btn btn--primary'
    // ],
    // [
    // 'title' => 'Secondary',
    // 'selector' => 'a',
    // 'classes' => 'btn btn--secondary'
    // ]
    // ]
    // ]
  ];

  $settings['style_formats'] = json_encode($style_formats);
  $settings['style_formats_merge'] = true;

  return $settings;
}

add_filter('tiny_mce_before_init', 'barebones_tiny_mce_before_init');


/**
 * Get post thumbnail url
 *
 * @param string $size
 * @param boolean $post_id
 * @param boolean $icon
 * @return void
 */

function get_post_thumbnail_url($size = 'full', $post_id = false, $icon = false)
{
  if (!$post_id) {
    $post_id = get_the_ID();
  }

  $thumb_url_array = wp_get_attachment_image_src(
    get_post_thumbnail_id($post_id),
    $size,
    $icon
  );
  return $thumb_url_array[0];
}


/**
 * Add Front Page edit link to admin Pages menu
 */

function front_page_on_pages_menu()
{
  global $submenu;
  if (get_option('page_on_front')) {
    $submenu['edit.php?post_type=page'][501] = array(
      __('Front Page', 'barebones'),
      'manage_options',
      get_edit_post_link(get_option('page_on_front'))
    );
  }
}

add_action('admin_menu', 'front_page_on_pages_menu');

/**
 * Misc WP Edits
 */
add_action('admin_menu', 'remove_default_post_type');

function remove_default_post_type()
{
  remove_menu_page('edit.php');
}

add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);

function remove_default_post_type_menu_bar($wp_admin_bar)
{
  $wp_admin_bar->remove_node('new-post');
}

add_action('wp_dashboard_setup', 'remove_draft_widget', 999);

function remove_draft_widget()
{
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}

// Removes comments from admin menu
add_action('admin_menu', 'my_remove_admin_menus');
function my_remove_admin_menus()
{
  remove_menu_page('edit-comments.php');
}

// Removes comments from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support()
{
  remove_post_type_support('post', 'comments');
  remove_post_type_support('page', 'comments');
}

// Removes comments from admin bar
function mytheme_admin_bar_render()
{
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');


/**
 * WP-Login Customisation
 */

//	Load custom stylesheet
function login_stylesheet()
{
  wp_enqueue_style('login-style', get_stylesheet_directory_uri() . '/dist/css/login.min.css');
}

add_action('login_enqueue_scripts', 'login_stylesheet');

//	Set Remember Me to checked
function login_checked_remember_me()
{
  add_filter('login_footer', 'rememberme_checked');
}
add_action('init', 'login_checked_remember_me');

function rememberme_checked()
{
  echo "<script>document.getElementById('rememberme').checked = true;</script>";
}

//	Change redirect
function wpb_login_logo_url()
{
  return 'https://inovomedia.co.uk';
}
add_filter('login_headerurl', 'wpb_login_logo_url');

function wpb_login_logo_url_title()
{
  return 'Website by Inovo Media';
}
add_filter('login_headertitle', 'wpb_login_logo_url_title');

// Removes site health check widget
add_action('wp_dashboard_setup', 'remove_site_health_dashboard_widget');
function remove_site_health_dashboard_widget()
{
  remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
}

// 404 page title
function theme_slug_filter_wp_title($title_parts)
{
  if (is_404()) {
    $title_parts['title'] = 'Uh oh. We can\'t seem to find the page you\'re looking for.';
  }

  return $title_parts;
}

// Hook into document_title_parts
add_filter('document_title_parts', 'theme_slug_filter_wp_title');

function remove_dashboard_meta()
{
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
  remove_meta_box('dashboard_primary', 'dashboard', 'normal');
  remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
  remove_meta_box('dashboard_activity', 'dashboard', 'normal');
}
add_action('admin_init', 'remove_dashboard_meta');

remove_action('admin_notices', 'update_nag');