<div class="lightbox_overlay">
    <div class="lightbox_wrapper">
        <div class="before_arrow">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/before.svg' ?>" alt="icone précédent">
        </div>
        <div class="before_chevron">
            &#10216;
        </div>
        <div class="after_arrow">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/after.svg' ?>" alt=" icone suivant">
        </div>
        <div class="after_chevron">
            &#10217;
        </div>
        <div class="close_lightbox">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/close.png' ?>" alt="icone fermer">
        </div>
        <div class="lightbox_img">
            <?php $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 1,
            );

            $lightbox_query = new WP_Query($args); ?>
            <?php if ($lightbox_query->have_posts()) : while ($lightbox_query->have_posts()) : $lightbox_query->the_post(); ?>
                    <div class=" lightbox_text lightbox_reference"><?php the_field('reference'); ?>
                    </div>
                    <div class="lightbox_text lightbox_categorie"><?php the_field('categories'); ?></div>
                    <?php $image_id = get_field('image');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'large');
                    } ?>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div><!-- .lightbox_img-->
    </div><!-- .lightbox_wrapper-->
</div><!-- .lightbox_overlay-->