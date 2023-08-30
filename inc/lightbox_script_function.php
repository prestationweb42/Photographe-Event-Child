<?php

/**
 * Enqueue Child Scripts.
 */
function lightbox_enqueue_script()
{
    wp_enqueue_style('lightbox-style', get_stylesheet_directory_uri() . '/sass/lightbox.css', array(), 100);
    wp_enqueue_script('lightbox-script', get_stylesheet_directory_uri() . '/js/lightbox.js', array('jquery'), '0.0.1', true);
}
add_action('wp_enqueue_scripts', 'lightbox_enqueue_script');
