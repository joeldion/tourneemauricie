<?php 
/*
 * Map
 */
?>
<section id="map" class="section section--map">
    <div class="section__head">
        <h2 class="section__head-title">
            <?php esc_html_e( get_option( 'tma_map_section_title' ) ); ?>
        </h2>
    </div>
    <div class="section__text">
        <?php echo wpautop( get_option( 'tma_map_section_text' ) ); ?>
    </div>
    <div class="map-container">
        <div id="gmap" class="gmap"></div>
    </div>
    <div class="section__text section__textsection__text--center">
        <p>Cochez le type de visite selon vos intérêts :</p>
    </div>
    <?php get_map_filters(); ?>
</section>