<?php
/* Redirect to front page after logout */
function auto_redirect_after_logout()
{
  $redirection_url = get_home_url();
  wp_safe_redirect($redirection_url);
  exit();
}
add_action('wp_logout', 'auto_redirect_after_logout');


/* Redirect to front page after success registration */
function auto_redirect_after_registration($redirection_url)
{
  $redirection_url = get_home_url();
  return $redirection_url;
}
add_filter('woocommerce_registration_redirect', 'auto_redirect_after_registration', 10, 1);


/* Redirect My Account page to Login page, if user not logged in */
function auto_redirect_for_non_logged_in_users()
{
  if (!is_user_logged_in() && is_page_template('template-account.php')) {
    $redirection_url = get_template_link('template-login.php');
    wp_redirect($redirection_url);
    exit;
  }
}
add_action('template_redirect', 'auto_redirect_for_non_logged_in_users');


/* Redirect to front page after login */
function login_redirect($redirect_to) {
  return home_url();
}
add_filter('woocommerce_login_redirect', 'login_redirect');