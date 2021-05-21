<?php
require_once('includes/functions/admin-setup.php');
require_once('includes/functions/scripts.php');
require_once('includes/functions/theme-setup.php');
require_once('includes/functions/advanced-custom-fields.php');
require_once('includes/functions/custom-post-types.php');
require_once('includes/functions/gravity-forms.php');
require_once('includes/functions/shortcodes.php');

// Redirect Users After Login
add_filter('login_redirect', 'redirect_to_home', 10, 3);
function redirect_to_home($redirect_to, $request, $user)
{
  if ($user->ID == 1) {
    // user->im-admin
    return '/dashboard';
  } elseif ($user->ID === 6) {
    // user->jmckenna
    return '/projects/hire-gym-equipment';
  } else {
    return $redirect_to;
  }
}

// Redirect Logged In Users
function add_login_check()
{
  if (is_page(196)) {
    // user->jmckenna
    if (is_user_logged_in() && get_current_user_id() === 6) {
      wp_redirect('/project/hire-gym-equipment');
      exit;
    }
  }

  if (!is_user_logged_in() && !is_page(196)) {
    auth_redirect();
  }
}

add_action('wp', 'add_login_check');