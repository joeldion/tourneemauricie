<?php
setlocale(LC_ALL, 'fr_CA');

/*
 * Constants
 */
defined('TMA_BASE') or define('TMA_BASE', __DIR__);
defined('TMA_URL') or define('TMA_URL', get_template_directory_uri());
defined('TMA_INC') or define('TMA_INC', TMA_BASE . '/inc/');
defined('TMA_TEMPLATE_SLUG')  or define('TMA_TEMPLATE_SLUG', 'template-parts/content');
defined('TMA_VER') or define('TMA_VER', '0.0.1');
defined('TMA_SCRIPT_GLOBALS') or define('TMA_SCRIPT_GLOBALS', [
    'baseURL'   =>  get_site_url(),
    'wpAjaxURL' =>  admin_url('admin-ajax.php'),
    'nonce'     =>  wp_create_nonce('TMA_nonce'),
]);

/*
 * Theme Support
 */
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('custom-logo');
add_theme_support('custom-selective-refresh-widgets');
add_theme_support('starter-content');
add_theme_support('menus');

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