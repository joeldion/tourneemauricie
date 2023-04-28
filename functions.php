<?php
setlocale(LC_ALL, 'fr_CA');

/*
 * Constants
 */
defined('TMA_BASE') or define('TMA_BASE', __DIR__ . '/');
defined('TMA_URL') or define('TMA_URL', get_template_directory_uri() . '/');
defined('TMA_INC') or define('TMA_INC', TMA_BASE . 'inc/');
defined('TMA_VER') or define('TMA_VER', '0.0.1');
defined('TMA_LOGO_SRC') or define('TMA_LOGO_SRC', esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ) );
defined('TMA_GLOBALS') or define('TMA_GLOBALS', [
    'baseURL'   =>  get_site_url(),
    'wpAjaxURL' =>  admin_url('admin-ajax.php'),
    'nonce'     =>  wp_create_nonce('TMA_nonce'),
]);
defined('TMA_LOCALS') or define('TMA_LOCALS', [
    'select_file'   =>  esc_html__('Select file'),
    'confirm'       =>  esc_html__('Select')
]);

/*
 * Theme Support
 */
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', [ 'search-form' ] );
add_theme_support( 'menus' );

/*
 * Includes
 */
$includes = [
    'clean-admin-menu',
    'detect-mobile',
    'enqueue',
    'helper-functions',
    'image-sizes',
    'login',
    'settings/settings'
];
foreach ($includes as $inc) {
    require_once(TMA_INC . $inc . '.php');
}

/*
 * Add category support to pages
 */
function tma_add_categories_to_pages() {
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'tma_add_categories_to_pages');

/*
 * Nav Menus
 */
register_nav_menus(['main-menu' =>  esc_html__('Main')]);

/*
 * BEM menu items
 */
function tma_bem_nav_menu_css_class($classes) {

    // Reset all default classes and start adding custom classes to array.
    $_classes = ['menu__item'];

    // Add 'has-children' class if menu element contains sub-menu
    if (in_array('menu-item-has-children', $classes)) {
        array_push($_classes, 'has-children');
    }

    return $_classes;

}
add_filter('nav_menu_css_class', 'tma_bem_nav_menu_css_class', 10, 4);