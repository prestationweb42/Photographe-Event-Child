<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="hero_section">

    <?php
            // récupération de la catégorie
            $category = array('mariage', 'concert', 'television', 'reception');

            // définition des arguments
            $args = array(
                'orderby' => 'rand',
                'post_type' => 'photo',
                'posts_per_page' => 1,
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'format',
                        'field' => 'slug',
                        'terms' => 'paysage',
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
    <div class="hero_img">
        <?php get_template_part('template-parts/post-img'); ?>
    </div>
    <?php endwhile;
            wp_reset_postdata() ?>

    <h1 class="hero_section_title">
        <svg viewbox="0 0 10 2">
            <text x="5" y="1" text-anchor="middle" font-size="0.7" fill="none" stroke-width=".02" stroke="#fff"
                font-family="space mono" font-style="italic" font-weight=900 text-transform="uppercase">PHOTOGRAPHE
                EVENT
            </text>
        </svg>
    </h1>
</section><!-- .hero_section-->

<section id="section_selects">
    <article id="left_box_select">
        <!-- Select filter category -->
        <div class="wrapper_select">
            <select name="category" id="filter_category" class="custom_select_box">
                <option value="" class="span_title">Catégories</option>
                <?php
                        $terms = get_terms('categorie');
                        foreach ($terms as $term) {
                            echo '<option value="' . $term->slug . '" class="sub_item">' . $term->name . '</option>';
                        }
                        ?>
            </select>
            <div class="custom_arrow"></div>
        </div>
        <!-- Select filter format -->
        <div class="wrapper_select">
            <select name="format" id="filter_format" class="custom_select_box">
                <option value="" class="span_title">Formats</option>
                <?php
                        $terms = get_terms('format');
                        foreach ($terms as $term) {
                            echo '<option value="' . $term->slug . '" class="sub_item">' . $term->name . '</option>';
                        }
                        ?>
            </select>
            <div class="custom_arrow"></div>
        </div>
    </article>
    <article id="right_box_select">
        <!-- Select filter date -->
        <div class="wrapper_select">
            <select name="format" id="filter_date" class="custom_select_box">
                <option value="" class="span_title">Date</option>
                <?php
                        $terms = get_terms('format');
                        foreach ($terms as $term) {
                            echo '<option value="' . $term->slug . '" class="sub_item">' . $term->name . '</option>';
                        }
                        ?>
            </select>
            <div class="custom_arrow"></div>
        </div>
    </article>
</section><!-- #section_selects -->

<!-- section post images container -->
<section class="section_post_imgs_container">
    <?php
            // récupération de la catégorie
            if (isset($_GET['categoryfilter'])) {
                $category = $_GET['categoryfilter'];
            } else {
                $category = array('mariage', 'concert', 'television', 'reception');
            }

            // récupération du format
            if (isset($_GET['formafilter'])) {
                $format = $_GET['formafilter'];
            } else {
                $format = array('paysage', 'portrait');
            };
            // définition des arguments
            $args = array(
                'orderby' => 'rand',
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'paged' => 1,
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'format',
                        'field' => 'slug',
                        'terms' => $format,
                        // 'terms' => 'paysage',
                    ),
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $category,
                        // 'terms' => 'mariage',
                    ),
                ),
            );
            // Définition / execution de wp query
            $query = new WP_Query($args);
            // Boucle d'execution de wp query
            while ($query->have_posts()) : $query->the_post();
            ?>
    <!-- Template part -->
    <div class="post_img">
        <div class="post_img_loop">
            <div class="text_category"><?php the_field('categories'); ?></div>
            <div class="text_reference"><?php the_field('reference'); ?></div>
            <div class="icon_eye"><img
                    src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/imgs/icon-eye.svg">
            </div>
            <div class="icon_fullscreen"><img
                    src="http://localhost:8888/PhotographeEvent/wp-content/themes/photographe-event/assets/imgs/Icon_fullscreen.png">
            </div>
        </div>
        <?php get_template_part('template-parts/post-img'); ?>
    </div>
    <?php endwhile;
            wp_reset_postdata() ?>
</section><!-- section_post_imgs_container -->
<section class=" section_btn_load_more">
    <div class="btn_load_more">
        <span>Charger Plus</span>
    </div>
</section><!-- .section_btn_load_more -->

<a href="http://localhost:8888/PhotographeEvent/photo/nathalie-0/">
    <img src="http://localhost:8888/PhotographeEvent/wp-content/uploads/2023/08/nathalie-11.webp" alt="">
</a>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>