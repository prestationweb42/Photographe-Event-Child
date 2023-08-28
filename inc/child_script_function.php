<?php

/**
 * Enqueue Child Scripts.
 */
function child_enqueue_script()
{
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/sass/style.css', array(), 100);
    wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/js/main.js', array(), '0.0.1', true);
}
add_action('wp_enqueue_scripts', 'child_enqueue_script');
