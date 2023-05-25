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
        <div class="section__head-text">
            <?php echo wpautop( get_option( 'tma_map_section_text' ) ); ?>
        </div>
    </div>
    <div class="map-container">
        <div id="gmap" class="gmap"></div>
    </div>
    <?php get_map_filters(); ?>
</section>