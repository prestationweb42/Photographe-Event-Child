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
        <?php $image_id = get_field('image'); // On récupère cette fois l'ID
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'medium-large');
                    } ?>
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
</section>
<section class="sort_section">
    <!-- Sort form box -->
    <form id="form_filter" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="post">
        <!-- Sort category box -->
        <ul class="search_list">
            <li class="list_item_title">
                <span class="span_title">Catégorie</span>
                <span class="span_logo">&#9660;</span>
                <ul class="sub_list">
                    <?php
                            $terms = get_terms('categorie');
                            foreach ($terms as $term) {
                                echo '<li class="sub_item"><a href="?categoryfilter=' . $term->slug . '">' . $term->name . '</a></li>';
                            }
                            ?>
                </ul>
            </li>
        </ul>
        <!-- Sort format box -->
        <ul class="search_list">
            <li class="list_item_title">
                <span class="span_title">Format</span>
                <span class="span_logo">&#9660;</span>
                <ul class="sub_list">
                    <?php
                            $terms = get_terms('format');
                            foreach ($terms as $term) {
                                echo '<li class="sub_item"><a href="?formafilter=' . $term->slug . '">' . $term->name . '</a></li>';
                            }
                            ?>
                </ul>
            </li>
        </ul>
        <!-- Sort date box -->
        <ul class="search_list">
            <li class="list_item_title">
                <span class="span_title">Date</span>
                <span class="span_logo">&#9660;</span>
                <ul class="sub_list">
                    <?php
                            $terms = get_terms('format');
                            foreach ($terms as $term) {
                                echo '<li class="sub_item"><a href="?formafilter=' . $term->slug . '">' . $term->name . '</a></li>';
                            }
                            ?>
                </ul>
            </li>
        </ul>
        <!-- <button type="submit" value="Filtrer"></button> -->
        <button id="btn-alert" class="btn btn-primary">Alert me!</button>
    </form> <!-- form_filter -->


    <a href="http://localhost:8888/PhotographeEvent/photo/nathalie-0/">
        <img src="http://localhost:8888/PhotographeEvent/wp-content/uploads/2023/08/nathalie-11.webp" alt="">
    </a>
</section><!-- sort_section -->
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
    <div class="post_img">
        <?php $image_id = get_field('image'); // On récupère cette fois l'ID
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'large');
                    } ?>
    </div>
    <?php endwhile;
            wp_reset_postdata() ?>
</section><!-- section_post_imgs_container -->
<section class="section_btn_load_more">
    <div class="btn_load_more">
        <span>Charger Plus</span>
    </div>
</section><!-- .btn_load_more -->
<?php endwhile;
endif; ?>
<?php get_footer(); ?>