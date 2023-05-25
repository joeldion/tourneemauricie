<?php 
/*
 * Setting: Footer
 */

add_settings_section(
    'tma-settings-footer-section',
    esc_html__( 'Footer' ),
    'tma_footer_settings_section_callback',
    'tma-settings-page'
);

add_settings_field(
    'tma_footer_logo',
    esc_html__( 'Logo', TMA_DOMAIN ),
    'tma_footer_logo_markup',
    'tma-settings-page',
    'tma-settings-footer-section'
);

add_settings_field(
    'tma_footer_copyright_text',
    esc_html__( 'Copyright Text', TMA_DOMAIN ),
    'tma_footer_copyright_text_markup',
    'tma-settings-page',
    'tma-settings-footer-section'
);

register_setting( 'tma-settings', 'tma_footer_logo' );
register_setting( 'tma-settings', 'tma_footer_copyright_text' );

function tma_footer_settings_section_callback() {}

function tma_footer_logo_markup() {
    tma_image_uploader( get_option( 'tma_footer_logo' ), 'tma_footer_logo' );
}

function tma_footer_copyright_text_markup() {
    ?>
    <input type="text" name="tma_footer_copyright_text" id="tma-footer-copyright-text" size="50" maxlength="50" value="<?php echo get_option( 'tma_footer_copyright_text' ); ?>">
    <?php
}