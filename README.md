# WordPress Project Dashboard

A simple WordPress Project Dashboard. Requires ACF &amp; Gravity Forms.

### Add the following to your functions.php to enable login redirect logic

```PHP
// Redirect Users After Login
add_filter('login_redirect', 'redirect_to_home', 10, 3);
function redirect_to_home($redirect_to, $request, $user)
{
  if ($user->ID == 1) {
    // Redirect admin to wp-admin on successful login
    return '/dashboard';
  } elseif ($user->ID == 2) {
    // user->name
    return 'REDIRECT_URL';
  } else {
    return $redirect_to;
  }
}
```

```PHP
// Redirect Logged In Users
function add_login_check()
{
  if (is_page(LOGIN_PAGE_ID)) {
    if (is_user_logged_in() && get_current_user_id() === 2) {
      // user->name
      wp_redirect('REDIRECT_URL');
      exit;
    }
  }

  if (!is_user_logged_in() && !is_page(LOGIN_PAGE_ID)) {
    auth_redirect();
  }
}

add_action('wp', 'add_login_check');
```
