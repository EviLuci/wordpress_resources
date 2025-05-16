<?php

// Custom styles for login page
function custom_login_styles()
{
  wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/assets/css/login-style.css');
}
add_action('login_enqueue_scripts', 'custom_login_styles');

// Change login logo URL to your homepage
function custom_login_url()
{
  return home_url();
}
add_filter('login_headerurl', 'custom_login_url');

// Change login logo title
function custom_login_title()
{
  return get_bloginfo('name');
}
add_filter('login_headertext', 'custom_login_title');

function custom_login_message($message)
{
  if (empty($message)) {
    return "<p style='text-align:center;' class='custom-message'>Welcome To Renity</p>";
  } else {
    return $message;
  }
}
add_filter('login_message', 'custom_login_message');

function custom_login_form_labels($translated_text, $text, $domain)
{
  switch ($translated_text) {
    case 'Username or Email Address':
      $translated_text = 'Your Login ID';
      break;
    case 'Password':
      $translated_text = 'Your Secret Key';
      break;
  }
  return $translated_text;
}
add_filter('gettext', 'custom_login_form_labels', 20, 3);
