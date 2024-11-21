<?php

/**
 * Plugin Name: Custom Gutenberg Blocks
 * Description: A custom plugin to add a Gutenberg block for Image and Content.
 * Version: 1.0
 * Author: Pandu Ramadhan
 * License: GPL2
 */

defined('ABSPATH') || exit;

// Register custom block category
function custom_gutenberg_blocks_category($categories)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'custom-gutenberg-blocks',
                'title' => __('Custom Gutenberg Blocks', 'custom-gutenberg-blocks'),
                'icon'  => 'dashicons-layout',
            ),
        )
    );
}
add_filter('block_categories_all', 'custom_gutenberg_blocks_category', 10, 2);

// Hook to register block
function custom_gutenberg_blocks_init()
{
    // Register block script (bundled output)
    wp_register_script(
        'custom-block-js',
        plugin_dir_url(__FILE__) . 'build/index.js', // Hasil bundling
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-block-editor'),
        filemtime(plugin_dir_path(__FILE__) . 'build/index.js')
    );

    // Register block editor style
    wp_register_style(
        'custom-block-editor-style',
        plugin_dir_url(__FILE__) . 'editor-style.css',
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'editor-style.css')
    );

    // Register front-end style
    wp_register_style(
        'custom-block-style',
        plugin_dir_url(__FILE__) . 'style.css',
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'style.css')
    );

    // Register block type
    register_block_type('custom/image-content', array(
        'editor_script' => 'custom-block-js',            // Editor script
        'editor_style'  => 'custom-block-editor-style',  // Editor style
        'style'         => 'custom-block-style',         // Front-end style
        'category'      => 'custom-gutenberg-blocks',    // Custom category
    ));
}
add_action('init', 'custom_gutenberg_blocks_init');

// Add menu to the admin dashboard
add_action('admin_menu', 'custom_gutenberg_blocks_admin_menu');

function custom_gutenberg_blocks_admin_menu()
{
    add_menu_page(
        'Custom Gutenberg Blocks',
        'Gutenberg Blocks',
        'manage_options',
        'custom-gutenberg-blocks',
        'custom_gutenberg_blocks_dashboard',
        'dashicons-layout',
        20
    );
}

// Display content for the dashboard menu
function custom_gutenberg_blocks_dashboard()
{
    echo '<div class="wrap">';
    echo '<h1>Custom Gutenberg Blocks</h1>';
    echo '<p>Welcome to the Custom Gutenberg Blocks plugin! Use this tool to create and manage custom Gutenberg blocks.</p>';
    echo '<p><strong>Block Available:</strong> Image & Content</p>';
    echo '<p>Use this block to add images and text content side-by-side in your posts or pages.</p>';
    echo '</div>';
}
