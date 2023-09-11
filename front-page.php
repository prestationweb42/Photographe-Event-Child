<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- Include Section Hero -->
<?php get_template_part('template-parts/front-page/section_hero'); ?>


<!-- Include Section Filters -->
<?php get_template_part('template-parts/front-page/filters'); ?>

<!-- Section Display Results Filtered  -->
<section id="section_result_filtered" class="section_post_imgs_container">
</section>


<!-- Section Display More images -->
<section id="section_display_more" class="section_post_imgs_container display_none">
    <?php
            // Post per page definition
            $post_per_page = 2;
            // Argument definition
            $args = array(
                'orderby' => 'rand',
                'post_type' => 'photo',
                'posts_per_page' => $post_per_page,
                // 'paged' => 10,
            );
            // Definition / Execution of wp-query
            $query = new WP_Query($args);
            // Execution loop of wp-query
            while ($query->have_posts()) : $query->the_post();
                $post_url = get_permalink();
                // $references = get_field('reference');
            ?>
    <div class="post_img">
        <!-- Overlay Img -->
        <div class="post_img_overlay">
            <div class="text_category"><?php the_field('categories'); ?></div>
            <div class="text_reference"><?php the_field('reference'); ?></div>
            <div class="icon_eye">
                <a href="<?php echo $post_url; ?>" class="lightbox_trigger">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/icon-eye.svg' ?>">
                </a>
            </div>
            <div class="icon_fullscreen" data-title="<?php the_title(); ?>"
                data-image="<?php echo esc_attr(get_the_post_thumbnail_url(get_the_ID())); ?>"
                data-reference="<?php the_field('reference'); ?>" data-categorie="<?php the_field('categories') ?>">

                <img src="
                    <?php echo get_template_directory_uri() . '/assets/img/Icon_fullscreen.png' ?>">
            </div>Ò
        </div>
        <!-- Overlay Img -->
        <?php get_template_part('template-parts/post-img'); ?>
    </div>
    <?php get_template_part('template-parts/lightbox'); ?>
    <?php endwhile;
            wp_reset_postdata() ?>
</section><!-- section_post_imgs_container -->
<div class="div_btn_load_more">
    <div class="btn_load_more">
        <span id="loadMoreBtn">Charger Plus</span>
    </div>
</div><!-- .div_btn_load_more -->

<?php endwhile;
endif; ?>
<?php get_footer(); ?>