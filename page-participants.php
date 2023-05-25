<?php
/*
 * Template Name: Participants
 */
esc_html__( 'Participants', TMA_DOMAIN );
?>
<?php get_header(); ?>
<main id="main" class="main">
    <?php get_template_part( 'template-parts/content', 'participants' ); ?>
    <?php get_template_part( 'template-parts/content', 'map' ); ?>
    <?php get_template_part( 'template-parts/content', 'contact' ); ?>
    <?php get_template_part( 'template-parts/content', 'partners' ); ?>
    <?php //get_template_part( 'template-parts/content', 'contact-form-participant' ); ?>
</main>
<?php get_footer(); ?>