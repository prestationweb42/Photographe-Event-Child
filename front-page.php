<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="hero_section">
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
    <!-- Sort left box -->
    <article class="search_container">
        <div class="search_container_left">
            <select class="select_format">
                <option value="">Catégories</option>
                <option value="reception">Réception</option>
                <option value="television">Télévision</option>
                <option value="concert">Concert</option>
                <option value="mariage">Mariage</option>
            </select>
            <select class="select_format" id="pet-select">
                <option value="">Formats</option>
                <option value="portrait">Portrait</option>
                <option value="paysage">Paysage</option>
            </select>
        </div>
        <!-- Select box right -->
        <div class="search_container_right">
            <select class="select_format" id="pet-select">
                <option value="">Date</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="hamster">Hamster</option>
                <option value="parrot">Parrot</option>
                <option value="spider">Spider</option>
                <option value="goldfish">Goldfish</option>
            </select>
        </div>
    </article>
</section>
<section class="photos_section">
    <a href="http://localhost:8888/PhotographeEvent/photo/nathalie-0/">
        <img src="http://localhost:8888/PhotographeEvent/wp-content/uploads/2023/08/nathalie-11.webp" alt="">
    </a>


    <form id="form-filter" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="post">
        <ul>
            <li> <a href="#">Catégorie</a></li>
            <?php
                    $terms = get_terms('categorie');
                    foreach ($terms as $term) {
                        echo '<li><a href="?categoryfilter=' . $term->slug . '">' . $term->name . '</a></li>';
                    }
                    ?>
        </ul>
        <hr>
        <ul>
            <li> <a href="#">Format</a></li>
            <?php
                    $terms = get_terms('format');
                    foreach ($terms as $term) {
                        echo '<li><a href="?formafilter=' . $term->slug . '">' . $term->name . '</a></li>';
                    }
                    ?>
        </ul>
        <hr>
        <button type="submit" value="Filtrer"></button>
    </form>
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
                'post_type' => 'photo',
                'posts_per_page' => 2,
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
            // définition et execution de la  wp query
            $query = new WP_Query($args);
            // Boucle d'execution de la  wp query
            while ($query->have_posts()) : $query->the_post();
            ?>
    <div>
        <?php $image_id = get_field('image'); // On récupère cette fois l'ID
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'large');
                    } ?>
    </div>
    <?php endwhile;
            wp_reset_postdata() ?>
    <pre>
            <?php
            // var_dump($query->get_posts());
            ?>
        </pre>


</section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>