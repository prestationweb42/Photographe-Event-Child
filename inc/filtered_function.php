<?php

/**
 * Document Filtered Imgs Front Page
 */
function enqueue_scripts_js_ajax()
{
    wp_enqueue_script('filters-script', get_stylesheet_directory_uri() . '/js/filters.js', array('jquery'), null, true);

    // Localize ajaxurl
    $translation_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    );
    // Localize the script
    wp_localize_script('ajax-script', 'photo', $translation_array);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_js_ajax');
/**
 * Function Filters Front Page
 */
function filter_results()
{
    $filter1 = isset($_POST['filter1']) ? sanitize_text_field($_POST['filter1']) : '';
    $filter2 = isset($_POST['filter2']) ? sanitize_text_field($_POST['filter2']) : '';
    $filter3 = isset($_POST['filter3']) ? sanitize_text_field($_POST['filter3']) : '';

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'categorie',
                'field' => 'slug',
                'terms' => $filter1
            ),
            array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' => $filter2
            ),
            array(
                'taxonomy' => 'date',
                'field' => 'slug',
                'terms' => $filter3
            )
        )
    );

    $filtered_query = new WP_Query($args);

    if ($filtered_query->have_posts()) {
        while ($filtered_query->have_posts()) {
            $filtered_query->the_post();
            $post_url = get_permalink();
?>
<div class="post_img">
    <div class="post_img_overlay">
        <div class="text_category"><?php the_field('categories'); ?></div>
        <div class="text_reference"><?php the_field('reference'); ?></div>
        <div class="icon_eye">
            <a href="<?php echo $post_url; ?>">
                <img src="<?php echo get_template_directory_uri() .  '/assets/img/icon-eye.svg' ?>">
            </a>
        </div>
        <div class="icon_fullscreen">
            <img src="<?php echo get_template_directory_uri() .  '/assets/img/Icon_fullscreen.png' ?>">
        </div>
    </div>
    <?php $image_id = get_field('image');
                if ($image_id) {
                    echo wp_get_attachment_image($image_id, 'large');
                } ?>
</div>
<?php
        }
        wp_reset_postdata();
    } else {
        echo '<div class="nothing_result">';
        echo '<p>Aucun résultat trouvé </p>';
        echo '<p>Pour la catégorie <span>' . $filter1 . '</span></p>';
        echo '<p>Au format <span>' . $filter2 . '</span></p>';
        echo '<p>En date de <span>' . $filter3 . '</span></p>';
        echo '</div>';
    }

    die();
}
add_action('wp_ajax_filter_results', 'filter_results');
add_action('wp_ajax_nopriv_filter_results', 'filter_results');