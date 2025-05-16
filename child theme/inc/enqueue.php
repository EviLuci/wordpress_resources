<?php
// The proper way to enqueue GSAP script in WordPress

// GSAP Library
function theme_gsap_script()
{
  // The core GSAP library
  wp_enqueue_script('gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), false, true);
  // ScrollTrigger - with gsap.js passed as a dependency
  wp_enqueue_script('gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array('gsap-js'), false, true);
  // Your animation code file - with gsap.js passed as a dependency
  wp_enqueue_script('gsap-js2', get_template_directory_uri() . '/assets/js/gsap.js', array('gsap-js'), false, true);
}

add_action('wp_enqueue_scripts', 'theme_gsap_script');

// Google Fonts
function google_fonts_link()
{
  // Google Font: Carattere
  wp_enqueue_style(
    'google-font-carattere',
    'https://fonts.googleapis.com/css2?family=Carattere&display=swap',
    false,
    null
  );
}
add_action('wp_enqueue_scripts', 'google_fonts_link');
