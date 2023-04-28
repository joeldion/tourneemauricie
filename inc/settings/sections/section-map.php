<?php 
/*
 * Setting: section Map
 */

add_settings_section(
    'tma-settings-map-section',
    'Carte',
    'tma_map_settings_section_callback',
    'tma-settings-page'
);

add_settings_field(
    'tma_map_title',
    'Titre de la section',
    'tma_map_title_markup',
    'tma-settings-page',
    'tma-settings-map-section'
);

add_settings_field(
    'tma_map_text',
    'Texte d\'introduction',
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
register_setting( 'tma-settings', 'tma_map_text' );

function tma_map_settings_section_callback() {}

function tma_map_title_markup() {
    ?>
    <input type="text" name="tma_map_title" id="tma-contact-title" size="80" maxlength="100" value="<?php echo get_option( 'tma_map_title' ); ?>">
    <?php
}

function tma_map_text_markup() {

    wp_editor(
        get_option( 'tma_map_text' ),
        'tma_map_text',
        [
            'media_buttons' => false,
            'drag_drop_upload' => false,
            'textarea_rows' => 5
        ]
    );

}