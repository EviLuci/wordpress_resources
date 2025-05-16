<?php

// Remove Unnecessary WordPress Features
// Remove Emoji Support
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove WP version from head
remove_action('wp_head', 'wp_generator');

// Remove Rest API link
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');

// Remove WordPress version from RSS feeds
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');
