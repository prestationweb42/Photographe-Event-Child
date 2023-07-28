<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header class="header">
        <!-- Assignation du menu principal -->
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main',
                'container' => 'ul', // afin d'éviter d'avoir une div autour 
                'menu_class' => 'site__header__menu', // ma classe personnalisée 
            )
        );
        ?>
        <!-- Moteur de recherche -->
        <?php get_search_form(); ?>
        <!-- Logo avec lien sur accueil -->
        <a href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
        </a>
    </header>