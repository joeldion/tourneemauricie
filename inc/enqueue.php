<?php 

add_action( 'wp_enqueue_scripts', 'tma_enqueue_public_styles' );
add_action( 'wp_enqueue_scripts', 'tma_enqueue_public_scripts' );
add_action( 'admin_enqueue_scripts', 'tma_enqueue_admin_styles' );
add_action( 'admin_enqueue_scripts', 'tma_enqueue_admin_scripts' );

function tma_get_file_version() {
    return current_user_can( 'administrator' ) ? time() : TMA_VER;
}

function tma_get_file_extension() {
    return current_user_can( 'administrator' ) ? '.js' : '.min.js';
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
        'google-maps',
        'https://maps.googleapis.com/maps/api/js?key=' . TMA_GMAP_API_KEY . '&v=weekly',
        [],
        '1.0',
        true
    );

    wp_enqueue_script(
        'tma-script-map',
        TMA_URL . 'assets/js/script-map' . tma_get_file_extension(),
        ['jquery', 'google-maps'],
        tma_get_file_version(),
        true
    );

    wp_enqueue_script(
        'tma-script-public',
        TMA_URL . 'assets/js/script-public' . tma_get_file_extension(),
        ['jquery', 'google-maps'],
        tma_get_file_version(),
        true
    );

    $scripts = [ 'tma-script-map', 'tma-script-public' ];
    foreach ( $scripts as $script ) {
        wp_localize_script(
            $script,
            'globals',
            TMA_GLOBALS
        );
    
        wp_localize_script(
            $script,
            'locals',
            TMA_LOCALS
        );
    }

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

    wp_enqueue_script(
        'google-maps',
        'https://maps.googleapis.com/maps/api/js?key=' . TMA_GMAP_API_KEY . '&v=weekly',
        [],
        '1.0',
        true
    );

}