<?php
function custom_theme_setup()
{
    // Add theme support for title-tag and custom logo
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('site-icon');  // Add support for site icon

    // Register menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'your-theme-textdomain'),
        'footer-menu'  => __('Footer Menu', 'your-theme-textdomain'),
    ));
}
add_action('after_setup_theme', 'custom_theme_setup');

function custom_theme_enqueue_scripts()
{
    wp_enqueue_style('custom-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'custom_theme_enqueue_scripts');

// Customizer function to allow editing of the homepage welcome text
function custom_theme_customize_register($wp_customize)
{
    // Add a section for the homepage text
    $wp_customize->add_section('homepage_section', array(
        'title' => __('Homepage Text', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Add setting for the homepage welcome text
    $wp_customize->add_setting('homepage_welcome_text', array(
        'default' => 'Welcome to Our Homepage',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for the setting to make it editable
    $wp_customize->add_control('homepage_welcome_text_control', array(
        'label' => __('Homepage Welcome Text', 'your-theme-textdomain'),
        'section' => 'homepage_section',
        'settings' => 'homepage_welcome_text',
        'type' => 'text',
    ));
}

add_action('customize_register', 'custom_theme_customize_register');
