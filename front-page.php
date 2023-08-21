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

    <!-- Select filter category -->
    <div class="wrapper_select_boxes">
        <div id="title_box_category" class="title_filter_box">
            <span id="span_title_category" class="span_title_filter">Catégories</span>
            <span id="span_icon_category" class="span_icon_filter">&#8964;
            </span>
        </div>
        <ul id="list_items_category" class="list_items_filter menu_close">
            <?php
                    $terms = get_terms('categorie');
                    foreach ($terms as $term) {
                        // echo '<li class="sub_item"><a href="?categoryfilter=' . $term->slug . '">' . $term->name . '</a></li>';
                        // echo '<li id="item_category" class="list_item"><a href="' . $term->slug . '">' . $term->name . '</a></li>';
                        echo '<li id="item_category" class="list_item">' . $term->name . '</li>';
                    }
                    ?>
        </ul>
    </div><!-- .wrapper_select_boxes -->
    <!-- Select filter format -->
    <div class="wrapper_select_boxes">
        <div id="title_box_format" class="title_filter_box">
            <span id="span_title_format" class="span_title_filter">Formats</span>
            <span id="span_icon_format" class="span_icon_filter">&#8964;
            </span>
        </div>
        <ul id="list_items_format" class="list_items_filter">
            <?php
                    $terms = get_terms('format');
                    foreach ($terms as $term) {
                        // echo '<li class="sub_item"><a href="?categoryfilter=' . $term->slug . '">' . $term->name . '</a></li>';
                        // echo '<li id="item_format" class="list_item"><a href="' . $term->slug . '">' . $term->name . '</a></li>';
                        echo '<li id="item_format" class="list_item">' . $term->name . '</li>';
                    }
                    ?>
        </ul>
    </div><!-- .wrapper_select_boxes -->
    <!-- Select filter date -->
    <div class="wrapper_select_boxes">
        <div id="title_box_date" class="title_filter_box">
            <span id="span_title_date" class="span_title_filter">Trier par</span>
            <span id="span_icon_date" class="span_icon_filter">&#8964;
            </span>
        </div>
        <ul id="list_items_date" class="list_items_filter">
            <?php
                    $terms = get_terms('date');
                    foreach ($terms as $term) {
                        // echo '<li class="sub_item"><a href="?categoryfilter=' . $term->slug . '">' . $term->name . '</a></li>';
                        // echo '<li id="item_date" class="list_item"><a href="' . $term->slug . '">' . $term->name . '</a></li>';
                        echo '<li id="item_date" class="list_item">' . $term->name . '</li>';
                    }
                    ?>
        </ul>
    </div><!-- .wrapper_select_boxes -->
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
        <div class="post_img_overlay">
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