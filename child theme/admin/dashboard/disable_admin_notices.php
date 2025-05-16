<?php

// Disable WordPress Admin Notices
function disable_admin_notices()
{
  global $wp_filter;
  if (is_user_admin()) {
    if (isset($wp_filter['user_admin_notices'])) {
      unset($wp_filter['user_admin_notices']);
    }
  } elseif (isset($wp_filter['admin_notices'])) {
    unset($wp_filter['admin_notices']);
  }
  if (isset($wp_filter['all_admin_notices'])) {
    unset($wp_filter['all_admin_notices']);
  }
}
add_action('admin_print_scripts', 'disable_admin_notices', 100);
