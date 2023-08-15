<footer id="footer_menu" class="footer_menu">
    <?php get_template_part('template-parts/modale'); ?>
    <?php get_template_part('template-parts/lightbox'); ?>
    <?php wp_nav_menu(
        array(
            'theme_location' => 'footer',
            'container' => 'ul', // afin d'éviter d'avoir une div autour 
            'menu_class' => 'site__footer__menu', // ma classe personnalisée 
        )
    ); ?>
    <!-- Mention texte -->
    <p class="footer_text">Tous droits réservés</p>
</footer>
<!-- id/class -->
<?php wp_footer(); ?>
</main><!-- classe main -->
</body>

</html>