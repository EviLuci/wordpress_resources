# Notes for Child theme

## WordPress conditional you can use

| Target            | Use                                           |
| ----------------- | --------------------------------------------- |
| Front Page        | `is_front_page()`                             |
| Homepage (Posts)  | `is_home()`                                   |
| Specific Page     | `is_page('contact')` or `is_page(42)`         |
| Specific Post     | `is_single(99)` or `is_single('hello-world')` |
| Post Type Archive | `is_post_type_archive('project')`             |
| Blog Posts        | `is_single() && get_post_type() === 'post'`   |
| Templates         | Use `is_page_template('template-custom.php')` |


### Example

```php
function blocksy_child_enqueue_assets() {
    // Global styles
    wp_enqueue_style('blocksy-child-global-style', get_stylesheet_directory_uri() . '/assets/css/global.css');

    // Global JS (shared across pages)
    wp_enqueue_script('blocksy-child-global-js', get_stylesheet_directory_uri() . '/assets/js/global.js', [], null, true);

    // Conditional JS/CSS based on context
    if (is_front_page()) {
        wp_enqueue_script('blocksy-child-homepage', get_stylesheet_directory_uri() . '/assets/js/homepage.js', [], null, true);
    }

    if (is_page('contact')) {
        wp_enqueue_style('blocksy-child-contact-style', get_stylesheet_directory_uri() . '/assets/css/contact.css');
        wp_enqueue_script('blocksy-child-contact', get_stylesheet_directory_uri() . '/assets/js/contact.js', [], null, true);
    }

    if (is_single() && get_post_type() === 'post') {
        wp_enqueue_script('blocksy-child-single-post', get_stylesheet_directory_uri() . '/assets/js/single-post.js', [], null, true);
    }

    // Load something on specific post/page ID
    if (is_page(42)) {
        wp_enqueue_script('blocksy-child-page-42', get_stylesheet_directory_uri() . '/assets/js/page-42.js', [], null, true);
    }
}
add_action('wp_enqueue_scripts', 'blocksy_child_enqueue_assets');
```
