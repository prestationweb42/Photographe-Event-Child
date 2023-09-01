<?php get_header(); ?>
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
            <section class="section_post_contact_nav">
                <div class="post_contact_text">
                    <p>Cette photo vous intéresse ?</p>
                    <a class="post_contact_link" href="#">
                        <span>Contact</span></a>
                </div>
                <!-- Pagination post prev / next -->
                <?php
                $next_post = get_next_post();
                $prev_post = get_previous_post();
                ?>
                <div class="post_photo_navigation"><!-- thumbs-navigation -->
                    <div id="post_photo_img"><!-- thumbs -->
                        <?php if (!empty($prev_post)) : ?>
                            <div class="post_photo thumb previous-thumb"> <?= get_post($prev_post->ID)->post_content; ?> </div>
                        <?php endif;  ?>
                        <?php if (!empty($next_post)) : ?>
                            <div class="post_photo thumb next-thumb"><?= get_post($next_post->ID)->post_content; ?> </div>
                        <?php endif;  ?>
                    </div>

                    <div id="post_photo_nav">
                        <?php if (!empty($prev_post)) : ?>
                            <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                <img class="previous previous-link" src="<?php echo get_template_directory_uri(); ?>/assets/img/prev_arrow.png" alt="Previous picture">
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($next_post)) : ?>
                            <a href="<?php echo get_permalink($next_post->ID); ?>">
                                <img class="next next-link" src="<?php echo get_template_directory_uri(); ?>/assets/img/next_arrow.png" alt="Next picture">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section><!-- .section_post_contact -->

            <!-- Contact section display -->
            <section class="section_post_other_imgs">
                <div class="post_other_text">
                    <h3>Vous aimerez aussi</h3>
                </div>
                <article class="post_other_imgs_container">
                    <?php
                    // Category recovery
                    $category = array('mariage', 'concert', 'television', 'reception');
                    // Format recovery
                    $format = array('paysage', 'portrait');
                    // definition of arguments
                    $args = array(
                        'orderby' => 'rand',
                        'post_type' => 'photo',
                        'posts_per_page' => 2,
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
                    // Définition / Execution of wp query
                    $query = new WP_Query($args);
                    // Wp query execution loop
                    while ($query->have_posts()) : $query->the_post();
                        $post_url = get_permalink();
                    ?>
                        <div class="post_img">
                            <div class="post_img_overlay">
                                <div class="text_category"><?php the_field('categories'); ?></div>
                                <div class="text_reference"><?php the_field('reference'); ?></div>
                                <div class="icon_eye">
                                    <a href="<?php echo $post_url; ?>" class="lightbox_trigger">
                                        <img src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/img/icon-eye.svg">
                                    </a>
                                </div>
                                <div class="icon_fullscreen">
                                    <a href="<?php echo wp_get_attachment_url($post_thumbnails_ID); ?>" class="" data-lightbox="photos" data-title="<span><?php echo $references; ?></span><span><?php echo $categorie; ?></span>">
                                        <img src="
                    http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/img/Icon_fullscreen.png">
                                    </a>
                                </div>
                            </div>
                            <?php get_template_part('template-parts/post-img'); ?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata() ?>
                </article>
            </section><!-- .section_post_other_imgs -->
            <section class="section_btn_load_all_imgs">
                <div class="btn_load_all_imgs">
                    <span>Toutes les Photos</span>
                </div>
            </section><!-- btn_all_post_imgs -->
        </main><!-- #main_single_photo_page -->
<?php endwhile;
endif; ?>

<?php get_footer(); ?>