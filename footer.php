<footer id="" class="">
    <?php wp_nav_menu(
        array(
            'theme_location' => 'footer',
            'container' => 'ul', // afin d'éviter d'avoir une div autour 
            'menu_class' => 'site__header__menu', // ma classe personnalisée 
        )
    ); ?>
    <!-- Mention texte -->
    <p class="footer_text">Tous droits réxervés</p>
</footer>
<!-- id/class -->
<?php wp_footer(); ?>
</body>

</html>