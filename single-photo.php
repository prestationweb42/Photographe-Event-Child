<?php get_header(); ?>
<h1>Article -> single-photo.php</h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- Section 1 -->
<section class="post_photo">
    <!-- Col Left Description -->
    <article class="post_photo_desc">
        <div class="post_photo_desc_content">
            <h1 class="post_photo_title"><?php the_title(); ?></h1>
            <!-- Affichage des valeur ACF pour les photos -->
            <div class="post_photo_text">Reference : <?php the_field('reference'); ?></div>
            <div class="post_photo_text">Catégorie : <?php the_field('categories'); ?></div>
            <div class="post_photo_text">Format : <?php the_field('format'); ?></div>
            <div class="post_photo_text">Type : <?php the_field('type'); ?></div>
            <div class="post_photo_text">Année : <?php the_field('annee'); ?></div>
        </div>
    </article>
    <!-- Col Right Photo -->
    <article class="post_photo_img">
        <?php $image_id = get_field('image'); // On récupère cette fois l'ID
                if ($image_id) {
                    echo wp_get_attachment_image($image_id, 'large');
                } ?>
    </article>
</section>
<!-- Affichage section contact -->
<section class="post_contact">
    <div class="post_contact_content">
        <p>Cette photo vous intéresse ?</p>
        <a class="post_contact_link" href="#">
            <span>Contact</span></a>
    </div>
    <!-- Pagination article suivant / precedent -->
    <div class="post_navigation">
        <div class="site__navigation__prev">
            <?php previous_post_link('Article Précédent<br>%link'); ?>
        </div>
        <div class="site__navigation__next">
            <?php next_post_link('Article Suivant<br>%link'); ?>
        </div>
    </div>
</section>
<!-- Affichage section contact -->
<section class="post_other_imgs">
    <div class="post_other_text">
        <p>Vous aimerez aussi</p>
    </div>
    <article class="post_other_imgs_container">
        <div class="post_other_imgs">
            <img src="http://localhost:8888/PhotographeEvent/wp-content/uploads/2023/08/nathalie-4-200x300.webp"
                alt="photo 4">
        </div>
        <div class="post_other_imgs">
            <img src="http://localhost:8888/PhotographeEvent/wp-content/uploads/2023/08/nathalie-1-768x512.webp"
                alt="photo 1">
        </div>
    </article>
    <div class="post_all_imgs">
        <a class="post_all_imgs_link" href="#">
            <span>Toutes les photos</span></a>
    </div>
</section>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>