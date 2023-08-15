<div class="lightbox_overlay">
    <div class="lightbox_wrapper">

        <div class="before_arrow">
            <img src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/imgs/before.svg"
                alt="icone précédent">
        </div>
        <div class="after_arrow">
            <img src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/imgs/after.svg"
                alt="icone suivant">
        </div>
        <div class="close_lightbox">
            <img src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/imgs/close.png"
                alt="icone suivant">
        </div>
        <div class="lightbox_img">
            <h1>CONTACT</h1>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="lightbox_photo_text">Reference : <?php the_field('reference'); ?></div>
            <div class="lightbox_photo_text">Catégorie : <?php the_field('categories'); ?></div>
            <div class="lightbox_photo_text">Format : <?php the_field('format'); ?></div>
            <div class="lightbox_photo_text">Type : <?php the_field('type'); ?></div>
            <div class="lightbox_photo_text">Année : <?php the_field('annee'); ?></div>
            <?php $image_id = get_field('image'); // On récupère cette fois l'ID
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'large');
                    } ?>
            <?php endwhile;
            endif; ?>
        </div><!-- .lightbox_img-->
    </div><!-- .lightbox_wrapper-->
</div><!-- .lightbox_overlay-->