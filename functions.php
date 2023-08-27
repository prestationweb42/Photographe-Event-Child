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

/**
 * Enqueue child styles.
 */
function child_enqueue_styles()
{
    wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/sass/style.css', array(), 100);
    wp_enqueue_style('font-awesome-bundle-script', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200', array(), false, 'all');
    wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/js/main.js', array(), '0.0.1', true);
    // wp_enqueue_script('jquery-script', get_stylesheet_directory_uri() . '/js/j-query.js', array('jquery'), null, true);
}

/**
 * Load more Ajax
 */
function photo_scripts()
{
    // Register the script
    wp_enqueue_script('jquery-script', get_stylesheet_directory_uri() . '/js/j-query.js', array('jquery'), false, true);

    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('load_more_posts'),
    );
    wp_localize_script('jquery-script', 'photo', $script_data_array);

    // Enqueued script with localized data.
    wp_enqueue_script('jquery-script');
}
/**
 * Load more post Ajax Front page
 */
function load_front_posts_by_ajax_callback()
{
    check_ajax_referer('load_more_posts', 'security');
    $args = array(
        'post_type' => 'photo',
        'post_status' => 'publish',
        'posts_per_page' => '2',
        'paged' => $_POST['page'],
    );
    $query_more_imgs = new WP_Query($args);
?>
    <?php if ($query_more_imgs->have_posts()) : ?>
        <?php while ($query_more_imgs->have_posts()) : $query_more_imgs->the_post();
            $post_url = get_permalink();
        ?>
            <div class="post_img">
                <div class="post_img_overlay">
                    <div class="text_category">Catégorie : <?php the_field('categories'); ?></div>
                    <div class="text_reference">Reference : <?php the_field('reference'); ?></div>
                    <div class="icon_eye">
                        <a href="<?php echo $post_url; ?>">
                            <img src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/imgs/icon-eye.svg">
                        </a>
                    </div>
                    <div class="icon_fullscreen"><img src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/imgs/Icon_fullscreen.png">
                    </div>
                </div>
                <?php $image_id = get_field('image'); // On récupère cette fois l'ID
                if ($image_id) {
                    echo wp_get_attachment_image($image_id, 'medium-large');
                } ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
<?php
    wp_die();
}
//
add_action('wp_enqueue_scripts', 'photo_scripts');
add_action('wp_enqueue_scripts', 'child_enqueue_styles');
add_action('wp_ajax_load_front_posts_by_ajax', 'load_front_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_front_posts_by_ajax', 'load_front_posts_by_ajax_callback');
//
require_once get_template_directory() . '/inc/load_jquery_function.php';
require_once get_template_directory() . '/inc/load_all_imgs_function.php';
require_once get_template_directory() . '/inc/filtered_function.php';
