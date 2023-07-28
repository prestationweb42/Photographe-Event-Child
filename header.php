<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    <main class="main">
        <header class="header">
            <!-- Assignation du menu principal -->
            <!-- Logo avec lien sur accueil -->
            <a href="<?php echo home_url('/'); ?>" class="header_logo_link">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo.png" class="header_logo_img" alt="Logo">
            </a>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main',
                    'container' => 'ul', // afin d'éviter d'avoir une div autour 
                    'menu_class' => 'site__header__menu', // ma classe personnalisée 
                )
            );
            ?>
        </header>