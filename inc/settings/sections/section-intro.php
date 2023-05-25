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

register_setting( 'tma-settings', 'tma_intro_text', 'tma_sanitize_lite_editor_field' );

function tma_intro_settings_section_callback() {}

function tma_intro_text_markup() {
    tma_lite_editor( 'tma_intro_text', get_option('tma_intro_text') );
}