<?php
get_header(); // Include the header.php file
?>

<main>
    <section class="content">
        <h1>Welcome to My Simple Theme!</h1>
        <p>This is a basic WordPress theme.</p>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </section>
</main>

<?php
get_footer(); // Include the footer.php file
?>
