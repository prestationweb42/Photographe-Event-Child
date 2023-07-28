<footer id="" class="">
    <?php get_template_part('template-parts/newsletter'); ?>
    <!-- Assignation du menu pied de page -->
    <?php wp_nav_menu(
        array(
            'theme_location' => 'footer',
            'container' => 'ul', // afin d'éviter d'avoir une div autour 
            'menu_class' => 'site__header__menu', // ma classe personnalisée 
        )
    ); ?>
</footer><!-- id/class -->
<?php wp_footer(); ?>
</body>

</html>