<?php 
/*
 * Front Page
 */
?>
<?php get_header('front-page'); ?>
<main id="main" class="main">
    <?php get_template_part( 'template-parts/content', 'intro' ); ?>
    <?php get_template_part( 'template-parts/content', 'map' ); ?>
    <?php get_template_part( 'template-parts/content', 'contact' ); ?>
    <?php get_template_part( 'template-parts/content', 'partners' ); ?>
    <?php //get_template_part( 'template-parts/content', 'contact-form-participant' ); ?>
</main>
<?php get_footer(); ?>