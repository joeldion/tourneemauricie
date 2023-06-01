<?php
setlocale(LC_ALL, 'fr_CA' );

/*
 * Constants
 */
defined( 'TMA_BASE' ) or define( 'TMA_BASE', __DIR__ . '/' );
defined( 'TMA_URL' ) or define( 'TMA_URL', get_template_directory_uri() . '/' );
defined( 'TMA_INC' ) or define( 'TMA_INC', TMA_BASE . 'inc/' );
defined( 'TMA_VER' ) or define( 'TMA_VER', '1.3.2' );
defined( 'TMA_DOMAIN' ) or define( 'TMA_DOMAIN', 'tourneemauricie' );
defined( 'TMA_RECAPTCHA_KEY' ) or define( 'TMA_RECAPTCHA_KEY', '6LfUVhQmAAAAALQpyTsHcvvdOpmmRCeepRVE09uI' );
defined( 'TMA_GLOBALS' ) or define( 'TMA_GLOBALS', [
    'baseURL'           =>  get_site_url(),
    'wpAjaxURL'         =>  admin_url( 'admin-ajax.php' ),
    'nonce'             =>  wp_create_nonce( 'TMA_nonce' ),
    'assetsPath'        => TMA_URL . 'assets/',
    'mapDataFilePath'   => TMA_URL . 'inc/google-map/data/',
    'mapDataTypesFile'  => TMA_URL . 'inc/google-map/data/map-data-types.json',
    'reCaptchaKey'      => TMA_RECAPTCHA_KEY,
]);
defined(' TMA_LOCALS' ) or define( 'TMA_LOCALS', [
    'select_file'   =>  esc_html__( 'Select file' ),
    'confirm'       =>  esc_html__( 'Select' ),
    'email_label'   =>  esc_html__( 'Email' ),
    'more_info'     =>  esc_html__( 'More info', TMA_DOMAIN )
]);

defined( 'TMA_GMAP_API_KEY' ) or define( 'TMA_GMAP_API_KEY', 'AIzaSyBZ1j5bpAFVJ4F2h4A7Qu4zpVOHmii-itA' );

/*
 * Theme Support
 */
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );
add_theme_support( 'html5', [ 'search-form' ] );
add_theme_support( 'menus' );

/*
 * Includes
 */
$includes = [
    'clean-admin-menu',
    'cpt/participants/init',
    'cpt/partners/init',
    'detect-mobile',
    'enqueue',
    'google-map/init',
    'helper-functions',
    'image-sizes',
    'login',
    'menus',
    'settings/init',
    'svg-support'
];
foreach ( $includes as $inc ) {
    require_once( TMA_INC . $inc . '.php' );
}

/*
 * Add category support to pages
 */
function tma_add_categories_to_pages() {
    register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'tma_add_categories_to_pages' );

/*
 * Private site except for sign up (temp)
 */
// function redirect_non_logged_in_users() {
//     if ( !is_user_logged_in() && !is_page('inscription') ) {
//             wp_redirect(home_url('/inscription/'));
//         exit();
//     }
// }
// add_action('template_redirect', 'redirect_non_logged_in_users');