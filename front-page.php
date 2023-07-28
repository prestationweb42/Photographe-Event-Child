<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <h1><?php the_title(); ?></h1>
                <p>Accueil -> front-page.php</p>

                <?php the_content(); ?>


                <!-- Test template part form -->
                <?php get_template_part('template-parts/newsletter'); ?>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>