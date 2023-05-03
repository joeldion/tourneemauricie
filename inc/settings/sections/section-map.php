<?php 
/*
 * Setting: Map
 */

add_settings_section(
    'tma-settings-map-section',
    esc_html__( 'Map', TMA_DOMAIN ),
    'tma_map_settings_section_callback',
    'tma-settings-page'
);

add_settings_field(
    'tma_map_title',
    esc_html__( 'Section Title', TMA_DOMAIN ),
    'tma_map_title_markup',
    'tma-settings-page',
    'tma-settings-map-section'
);

add_settings_field(
    'tma_map_text',
    esc_html__( 'Introduction Text', TMA_DOMAIN ),
    'tma_map_text_markup',
    'tma-settings-page',
    'tma-settings-map-section'
);

register_setting( 
    'tma-settings', 
    'tma_map_title',
    [
        'type'              =>  'string',
        'sanitize_callback' =>  'sanitize_text_field'
    ]
);
register_setting( 'tma-settings', 'tma_map_text', 'tma_sanitize_lite_editor_field' );

function tma_map_settings_section_callback() {}

function tma_map_title_markup() {
    ?>
    <input type="text" name="tma_map_title" id="tma-contact-title" size="80" maxlength="100" value="<?php echo get_option( 'tma_map_title' ); ?>">
    <?php
}

function tma_map_text_markup() {
    tma_lite_editor( 'tma_map_text', get_option('tma_map_text') );
}