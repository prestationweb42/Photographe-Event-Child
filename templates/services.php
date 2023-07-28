<?php
/*
  Template Name: Services
*/
get_header();
if (have_posts()) : while (have_posts()) : the_post();
?>
<!-- titre de la page -->
<h1><?php the_title(); ?></h1>
<div class="content">
    <?php the_content(); ?>
    <h1>Page issue d'un template</h1>
    <p>
        Champ personnalisé :
        <strong>Note :</strong>
        <?php echo get_post_meta(get_the_ID(), 'note', true); ?> / 10
    </p>
    <?php the_post_thumbnail(); ?>
</div>
<?php
  endwhile;
endif;
get_footer();
?>