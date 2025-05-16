<?php
if (! defined('WP_DEBUG')) {
    die('Direct access forbidden.');
}
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('blocksy-child-style', get_stylesheet_uri());
});

// Enqueue file for feature scripts
// This file is used to enqueue scripts and styles for the child theme
require_once get_stylesheet_directory() . '/inc/enqueue.php';

// Admin Customization
require_once get_stylesheet_directory() . '/admin/customize_admin.php';
