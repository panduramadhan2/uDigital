<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <?php wp_head(); ?> <!-- WordPress hook to include additional elements like styles or scripts -->
</head>

<body <?php body_class(); ?>>

    <header>
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
        <?php
        // Display navigation menu
        wp_nav_menu(array(
            'theme_location' => 'primary', // Will define this in functions.php
            'container' => 'nav',
            'container_class' => 'main-nav'
        ));
        ?>
    </header>