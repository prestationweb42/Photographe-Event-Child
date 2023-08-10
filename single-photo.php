<?php get_header(); ?>
<h1>Article -> single-photo.php</h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <main id="main_single_photo_page">
            <!-- Section section_post_photos -->
            <section class="section_post_photos">
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
                </article><!-- post_photo_desc -->
                <!-- Col Right Photo -->
                <article class="post_photo_img">
                    <?php $image_id = get_field('image'); // On récupère cette fois l'ID
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'large');
                    } ?>
                </article>
            </section><!-- .section_post_photos -->
            <!-- Affichage section contact -->
            <section class="section_post_contact">
                <div class="post_contact_text">
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
            </section><!-- .section_post_contact -->
            <!-- Affichage section contact -->
            <section class="section_post_other_imgs">
                <div class="post_other_text">
                    <h3>Vous aimerez aussi</h3>
                </div>
                <article class="post_other_imgs_container">
                    <?php
                    // récupération de la catégorie
                    $category = array('mariage', 'concert', 'television', 'reception');
                    // récupération du format
                    $format = array('paysage', 'portrait');
                    // définition des arguments
                    $args = array(
                        'orderby' => 'rand',
                        'post_type' => 'photo',
                        'posts_per_page' => 20,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'format',
                                'field' => 'slug',
                                'terms' => $format,
                            ),
                            array(
                                'taxonomy' => 'categorie',
                                'field' => 'slug',
                                'terms' => $category,
                            ),
                        ),
                    );
                    // Définition / execution de wp query
                    $query = new WP_Query($args);
                    // Boucle d'execution de wp query
                    while ($query->have_posts()) : $query->the_post();
                    ?>
                        <div class="post_other_imgs">
                            <?php $image_id = get_field('image'); // On récupère cette fois l'ID
                            if ($image_id) {
                                echo wp_get_attachment_image($image_id, 'large');
                            } ?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata() ?>
                </article>
                <div class="btn_post_all_imgs">
                    <a class="post_all_imgs_link" href="#">
                        <span>Toutes les photos</span></a>
                </div>
            </section><!-- .section_post_other_imgs -->
        </main><!-- #main_single_photo_page -->
<?php endwhile;
endif; ?>

<?php get_footer(); ?>