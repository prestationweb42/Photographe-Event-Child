<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="hero_section">
            <h1 class="hero_section_title">
                <svg viewbox="0 0 10 2">
                    <text x="5" y="1" text-anchor="middle" font-size="0.7" fill="none" stroke-width=".02" stroke="#fff" font-family="space mono" font-style="italic" font-weight=900 text-transform="uppercase">PHOTOGRAPHE
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
        </section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>