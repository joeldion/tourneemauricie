<?php 
/*
 * Setting: Participants Sections
 */

add_settings_section(
    'tma-settings-participants-section',
    esc_html__( 'Participants Sections', TMA_DOMAIN ),
    'tma_participants_settings_section_callback',
    'tma-settings-page'
);

for ( $i = 1; $i <= wp_count_terms('tma_participant_region'); $i++ ) {

    add_settings_field(
        'tma_participants_section_title_' . $i,
        esc_html__( 'Section Title', TMA_DOMAIN ) . '&nbsp;' . $i,
        'tma_participants_section_title_markup',
        'tma-settings-page',
        'tma-settings-participants-section',
        [ 'index' => $i ]
    );

    add_settings_field(
        'tma_participants_section_region_' . $i,
        esc_html( _nx( 'Region', 'Regions', 1, 'Region name', TMA_DOMAIN ) )  . '&nbsp;' . $i,
        'tma_participants_section_region_markup',
        'tma-settings-page',
        'tma-settings-participants-section',
        [ 'index' => $i ]
    );

    register_setting( 'tma-settings', 'tma_participants_section_title_' . $i );
    register_setting( 'tma-settings', 'tma_participants_section_region_' . $i );

}

add_settings_field(
    'tma_participants_default_image',
    esc_html__( 'Default Image', TMA_DOMAIN ),
    'tma_participants_default_image_markup',
    'tma-settings-page',
    'tma-settings-participants-section'
);
register_setting( 'tma-settings', 'tma_participants_default_image' );

function tma_participants_settings_section_callback() {}

function tma_participants_section_title_markup( $args ) {

    $i = $args[ 'index' ];
    ?>
    <input type="text" name="tma_participants_section_title_<?php echo $i; ?>" id="tma-participants-section-title-<?php echo $i; ?>" size="30" maxlength="30" value="<?php echo get_option( 'tma_participants_section_title_' . $i ); ?>">
    <?php

}

function tma_participants_section_region_markup( $args ) {

    $i = $args[ 'index' ];
    $saved_region = get_option( 'tma_participants_section_region_' . $i );
    tma_get_participant_region_selector( $saved_region, 'tma_participants_section_region_' . $i );

}

function tma_participants_default_image_markup() {

    tma_image_uploader( get_option( 'tma_participants_default_image' ), 'tma_participants_default_image' );

}