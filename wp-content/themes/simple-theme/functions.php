<?php
function simple_theme_setup()
{
    // Add support for WordPress features
    add_theme_support('title-tag'); // Dynamic title tag
    add_theme_support('post-thumbnails'); // Featured images
    add_theme_support('custom-logo'); // Custom logo support

    // Register primary menu
    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));
}
add_action('after_setup_theme', 'simple_theme_setup');

// Enqueue stylesheets and scripts
function simple_theme_enqueue_scripts()
{
    wp_enqueue_style('simple-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'simple_theme_enqueue_scripts');
