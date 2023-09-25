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
            <?php get_template_part('template-parts/photo_img'); ?>
        </div>
    <?php endwhile;
    wp_reset_postdata() ?>

    <h1 class="hero_section_title">
        <svg viewbox="0 0 10 2">
            <text x="5" y="1" text-anchor="middle" font-size="0.7" fill="none" stroke-width=".02" stroke="#fff" font-family="space mono" font-style="italic" font-weight=900 text-transform="uppercase">PHOTOGRAPHE
                EVENT
            </text>
        </svg>
    </h1>
</section><!-- .hero_section-->