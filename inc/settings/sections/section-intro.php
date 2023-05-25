<?php 
/*
 * Setting: Intro Text
 */

add_settings_section(
    'tma-settings-intro-section',
    esc_html__( 'Introduction' ),
    'tma_intro_settings_section_callback',
    'tma-settings-page'
);

add_settings_field(
    'tma_intro_text',
    esc_html__( 'Text' ),
    'tma_intro_text_markup',
    'tma-settings-page',
    'tma-settings-intro-section'
);

add_settings_field(
    'tma_intro_image',
    esc_html__( 'Image' ),
    'tma_intro_image_markup',
    'tma-settings-page',
    'tma-settings-intro-section'
);

add_settings_field(
    'tma_intro_btn_text',
    esc_html__( 'Button Text', TMA_DOMAIN ),
    'tma_intro_btn_text_markup',
    'tma-settings-page',
    'tma-settings-intro-section'
);

add_settings_field(
    'tma_intro_btn_link',
    esc_html__( 'Button Link', TMA_DOMAIN ),
    'tma_intro_btn_link_markup',
    'tma-settings-page',
    'tma-settings-intro-section'
);

register_setting( 'tma-settings', 'tma_intro_text', 'tma_sanitize_lite_editor_field' );
register_setting( 'tma-settings', 'tma_intro_image' );
register_setting( 'tma-settings', 'tma_intro_btn_text' );
register_setting( 'tma-settings', 'tma_intro_btn_link' );

function tma_intro_settings_section_callback() {}

function tma_intro_text_markup() {
    tma_lite_editor( 'tma_intro_text', get_option('tma_intro_text') );
}

function tma_intro_image_markup() {
    tma_image_uploader( get_option( 'tma_intro_image' ), 'tma_intro_image' );
}

function tma_intro_btn_text_markup() {
    ?>
        <input type="text" name="tma_intro_btn_text" id="tma_intro_btn_text" size="20" maxlength="20" value="<?php esc_html_e( get_option('tma_intro_btn_text') ); ?>">
    <?php
}

function tma_intro_btn_link_markup() {
    ?>
        <input type="url" name="tma_intro_btn_link" id="tma_intro_btn_link" size="80" maxlength="200" value="<?php echo esc_url( get_option('tma_intro_btn_link') ); ?>">
    <?php
}