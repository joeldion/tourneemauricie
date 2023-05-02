<?php 

add_action( 'wp_enqueue_scripts', 'tma_enqueue_public_styles' );
add_action( 'wp_enqueue_scripts', 'tma_enqueue_public_scripts' );
add_action( 'admin_enqueue_scripts', 'tma_enqueue_admin_styles' );
add_action( 'admin_enqueue_scripts', 'tma_enqueue_admin_scripts' );

function tma_get_file_version() {
    return current_user_can( 'administrator' ) ? time() : TMA_VER;
}

/*
 * Public Enqueue
 */
function tma_enqueue_public_styles() {

    wp_enqueue_style(
        'tma-style-public',
        TMA_URL . 'assets/css/style-public.css',
        [],
        tma_get_file_version(),
        'all'
    );

}

function tma_enqueue_public_scripts() {

    wp_enqueue_script(
        'tma-script-public',
        TMA_URL . 'assets/js/script-public.js',
        ['jquery'],
        tma_get_file_version(),
        true
    );

    wp_localize_script(
        'tma-script-public',
        'locals',
        TMA_LOCALS
    );

}

/*
 * Admin Enqueue
 */
function tma_enqueue_admin_styles() {

    wp_enqueue_style(
        'tma-style-admin',
        TMA_URL . 'assets/css/style-admin.css',
        [],
        tma_get_file_version(),
        'all'
    );

}

function tma_enqueue_admin_scripts() {

    wp_enqueue_script( 'media-upload' );
    wp_enqueue_media();

    wp_enqueue_script(
        'tma-script-admin',
        TMA_URL . 'assets/js/script-admin.js',
        ['jquery'],
        tma_get_file_version(),
        true
    );

    wp_localize_script(
        'tma-script-admin',
        'locals',
        TMA_LOCALS
    );

}