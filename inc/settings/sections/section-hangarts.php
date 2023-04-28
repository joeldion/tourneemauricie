<?php 
/*
 * Setting: section listing
 */

add_settings_section(
    'tma-settings-listing-section',
    'Liste des participants',
    'tma_listing_settings_section_callback',
    'tma-settings-page'
);

add_settings_field(
    'tma_listing_title',
    'Titre de la section',
    'tma_listing_title_markup',
    'tma-settings-page',
    'tma-settings-listing-section'
);

add_settings_field(
    'tma_listing_text',
    'Texte d\'introduction',
    'tma_listing_text_markup',
    'tma-settings-page',
    'tma-settings-listing-section'
);

register_setting( 
    'tma-settings', 
    'tma_listing_title',
    [
        'type'              =>  'string',
        'sanitize_callback' =>  'sanitize_text_field'
    ]
);
register_setting( 'tma-settings', 'tma_listing_text' );

function tma_listing_settings_section_callback() {}

function tma_listing_title_markup() {
    ?>
    <input type="text" name="tma_listing_title" id="tma-contact-title" size="40" maxlength="30" value="<?php echo get_option( 'tma_listing_title' ); ?>">
    <?php
}

function tma_listing_text_markup() {

    wp_editor(
        get_option( 'tma_listing_text' ),
        'tma_listing_text',
        [
            'media_buttons' => false,
            'drag_drop_upload' => false,
            'textarea_rows' => 5
        ]
    );

}