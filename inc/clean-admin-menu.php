<?php 
/*
 * Clean Admin Menu
 */

add_action('admin_menu', 'tma_clean_admin_menu');

function tma_clean_admin_menu() {

        // Ignore for administrators
        if (current_user_can('administrator')) return;

        remove_menu_page('edit.php');
        remove_menu_page('edit.php?post_type=page');
        remove_menu_page('themes.php');
        remove_menu_page('edit-comments.php');
        remove_menu_page('tools.php');
        remove_menu_page('users.php');
        remove_menu_page('plugins.php');
        remove_menu_page('options-general.php');

}