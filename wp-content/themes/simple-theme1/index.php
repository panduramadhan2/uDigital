<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <nav>
            <?php wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'container'      => 'nav',
                'container_class' => 'primary-menu-container',
                'menu_class'     => 'primary-menu'
            )); ?>
        </nav>

        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php endif; ?>

            <div class="site-title">
                <h1><?php bloginfo('name'); ?></h1>
            </div>

            <div class="site-tagline">
                <p><?php bloginfo('description'); ?></p>
            </div>
        </div>
    </header>

    <main>
        <?php
        if (is_front_page()) {
            // Get the custom text from the Customizer
            $welcome_text = get_theme_mod('homepage_welcome_text', 'Welcome to Our Homepage');
            echo '<h1>' . esc_html($welcome_text) . '</h1>';
        } else {
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_title('<h2>', '</h2>');
                    the_content();
                endwhile;
            else :
                echo '<p>No content available.</p>';
            endif;
        }
        ?>
    </main>


    <footer>
        <div class="footer-content">
            <p>&copy; <?php echo date('Y'); ?> Pandu Ramadhan. All rights reserved.</p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>

</html>