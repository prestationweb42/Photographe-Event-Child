<?php

// Ajouter 2 emplacements de menus
register_nav_menus(array(
    'main' => 'Menu Principal',
    'footer' => 'Bas de page',
));

// change HEADER menu CONTACT Link
add_filter('wp_nav_menu_items', 'add_header_link', 10, 2);
function add_header_link($items, $args)
{
    if ($args->theme_location === 'main') {
        $new_item       = array('<li class="menu-item menu-item-23"><a href="#">CONTACT</a></li>');
        $items          = preg_replace('/<\/li>\s<li/', '</li>,<li',  $items);

        $array_items    = explode(
            ',',
            $items
        );
        array_splice($array_items, 2, 0, $new_item);
        $items          = implode(
            '',
            $array_items
        );
    }
    return $items;
}

// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');


//
require_once get_template_directory() . '/inc/child_script_function.php';
require_once get_template_directory() . '/inc/load_jquery_function.php';
require_once get_template_directory() . '/inc/load_ajax_function.php';
require_once get_template_directory() . '/inc/load_all_imgs_function.php';
require_once get_template_directory() . '/inc/load_more_imgs_function.php';
require_once get_template_directory() . '/inc/filtered_function.php';
require_once get_template_directory() . '/inc/lightbox_script_function.php';
