<?php

// Ajouter 2 emplacements de menus
register_nav_menus(array(
    'main' => 'Menu Principal',
    'footer' => 'Bas de page',
));


// Ajouter la sidebar
register_sidebar(array(
    'id' => 'blog-sidebar',
    'name' => 'Blog',
    'before_widget'  => '<div class="site__sidebar__widget %2$s">',
    'after_widget'  => '</div>',
    'before_title' => '<p class="site__sidebar__widget__title">',
    'after_title' => '</p>',
));


// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

/**
 * Enqueue child styles.
 */
function child_enqueue_styles()
{
    wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/sass/style.css', array(), 100);
    wp_register_script('child-script', get_theme_file_uri() . '/js/main.js', array(), '0.0.1', true);
    wp_enqueue_script('child-script');
}

add_action('wp_enqueue_scripts', 'child_enqueue_styles');
