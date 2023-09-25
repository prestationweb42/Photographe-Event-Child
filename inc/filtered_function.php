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
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $date = isset($_POST['date']) ? sanitize_text_field($_POST['date']) : '';

    // Define Query Relation
    $tax_query = array('relation' => 'AND');

    // check if category exists before adding corresponding taxonomy
    if ((isset($category)) and ($category != "")) {
        $tax_query[] = array(
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $category,
        );
    }

    // check if format exists before adding corresponding taxonomy
    if ((isset($format)) and ($format != "")) {
        $tax_query[] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format,
        );
    }

    // check if date exists before adding corresponding taxonomy
    if ((isset($date)) and ($date != "")) {
        $tax_query[] = array(
            'taxonomy' => 'date',
            'field' => 'slug',
            'terms' => $date,
        );
    }

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'tax_query' => $tax_query
    );

    $filtered_query = new WP_Query($args);

    if ($filtered_query->have_posts()) {
        while ($filtered_query->have_posts()) {
            $filtered_query->the_post();
            $post_url = get_permalink();
?>
            <!-- Template Post Card -->
            <?php get_template_part('template-parts/photo_block'); ?>
<?php
        }
        wp_reset_postdata();
    } else {
        echo '<div class="nothing_result">';
        echo '<p>Aucun résultat trouvé </p>';
        echo '<p>Pour la catégorie <span>' . $category . '</span></p>';
        echo '<p>Au format <span>' . $format . '</span></p>';
        echo '<p>En date de <span>' . $date . '</span></p>';
        echo '</div>';
    }

    die();
}
add_action('wp_ajax_filter_results', 'filter_results');
add_action('wp_ajax_nopriv_filter_results', 'filter_results');
