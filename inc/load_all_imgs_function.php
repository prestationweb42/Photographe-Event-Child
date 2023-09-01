<?php

/**
 * Document Include Function Load ALL imgs -> Single-page
 */
function load_all_imgs()
{
    check_ajax_referer('load_more_posts', 'security');
    $args = array(
        'post_type' => 'photo',
        'post_status' => 'publish',
        'posts_per_page' => '-1',
        'paged' => $_POST['page'],
    );
    $query_all_imgs = new WP_Query($args);
?>
    <?php if ($query_all_imgs->have_posts()) : ?>
        <?php while ($query_all_imgs->have_posts()) : $query_all_imgs->the_post();
            $post_url = get_permalink();
        ?>
            <div class="post_img">
                <div class="post_img_overlay">
                    <div class="text_category">Catégorie : <?php the_field('categories'); ?></div>
                    <div class="text_reference">Reference : <?php the_field('reference'); ?></div>
                    <div class="icon_eye">
                        <a href="<?php echo $post_url; ?>">
                            <img src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/img/icon-eye.svg">
                        </a>
                    </div>
                    <div class="icon_fullscreen"><img src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/img/Icon_fullscreen.png">
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
add_action('wp_ajax_load_single_posts_by_ajax', 'load_all_imgs');
add_action('wp_ajax_nopriv_load_single_posts_by_ajax', 'load_all_imgs');
