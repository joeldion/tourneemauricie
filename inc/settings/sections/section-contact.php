<?php 
/*
 * Setting: Contact
 */

add_settings_section(
    'tma-settings-contact-section',
    esc_html__( 'Contact Info', TMA_DOMAIN ),
    'tma_contact_settings_section_callback',
    'tma-settings-page'
);

add_settings_field(
    'tma_contact_title',
    esc_html__( 'Section Title', TMA_DOMAIN ),
    'tma_contact_title_markup',
    'tma-settings-page',
    'tma-settings-contact-section'
);

add_settings_field(
    'tma_contact_phone',
    esc_html__( 'Phone' ),
    'tma_contact_phone_markup',
    'tma-settings-page',
    'tma-settings-contact-section'
);

add_settings_field(
    'tma_contact_email',
    esc_html__( 'Email' ),
    'tma_contact_email_markup',
    'tma-settings-page',
    'tma-settings-contact-section'
);

register_setting( 'tma-settings', 'tma_contact_title' );
register_setting( 'tma-settings', 'tma_contact_phone' );
register_setting( 'tma-settings', 'tma_contact_email' );

function tma_contact_settings_section_callback() {}

function tma_contact_title_markup() {
    ?>
    <input type="text" name="tma_contact_title" id="tma-contact-title" size="40" maxlength="30" value="<?php echo get_option( 'tma_contact_title' ); ?>">
    <?php
}

function tma_contact_phone_markup() {
    ?>
    <input type="tel" name="tma_contact_phone" id="tma-contact-phone" size="40" value="<?php echo get_option( 'tma_contact_phone' ); ?>">
    <?php
}

function tma_contact_email_markup() {
    ?>
    <input type="email" name="tma_contact_email" id="tma-contact-email" size="40" value="<?php echo get_option( 'tma_contact_email' ); ?>">
    <?php
}