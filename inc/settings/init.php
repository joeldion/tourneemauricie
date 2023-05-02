<?php 
/*
 * Settings
 */

add_action('admin_menu', 'tma_settings_admin_menu');
add_action('admin_init', 'tma_settings_init');

function tma_settings_admin_menu() {

    add_menu_page(
        esc_html__('Edit content', TMA_DOMAIN),
        esc_html__('Edit content', TMA_DOMAIN),
        'manage_options',
        'tma-settings-page',
        'tma_settings',
        'dashicons-edit',
        4
    );

}

function tma_settings() {
    ?>
    <h1><?php esc_html_e('Edit content', TMA_DOMAIN); ?></h1>
    <hr>
    <div id="tma-settings">
        <form action="options.php" method="post">
            <?php
                submit_button();
                do_settings_sections('tma-settings-page');
                settings_fields('tma-settings');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

function tma_settings_init() {
    require_once(__DIR__ . '/sections/section-intro.php');
    require_once(__DIR__ . '/sections/section-map.php');
    require_once(__DIR__ . '/sections/section-contact.php');
}