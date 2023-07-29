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


<?php endwhile;
endif; ?>

<?php get_footer(); ?>