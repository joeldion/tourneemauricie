<?php 
/*
 * Setting: Contact
 */

add_settings_section(
    'tma-settings-contact-section',
    'Informations de contact',
    'tma_contact_settings_section_callback',
    'tma-settings-page'
);

add_settings_field(
    'tma_contact_title',
    'Titre de la section',
    'tma_contact_title_markup',
    'tma-settings-page',
    'tma-settings-contact-section'
);

add_settings_field(
    'tma_contact_phone',
    'Téléphone',
    'tma_contact_phone_markup',
    'tma-settings-page',
    'tma-settings-contact-section'
);

add_settings_field(
    'tma_contact_email',
    'Courriel',
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