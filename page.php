<?php get_header(); ?>
<main id="main" class="main">
    <section class="section section--content">
        <?php the_content(); ?>
    </section>    
    <?php get_template_part( 'template-parts/content', 'map' ); ?>
    <?php get_template_part( 'template-parts/content', 'contact' ); ?>
    <?php get_template_part( 'template-parts/content', 'partners' ); ?>
</main>
<?php get_footer(); ?>