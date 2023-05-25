<?php 
/*
 * Nav Menus
 */
register_nav_menus( 
    [ 
        'main-menu' =>  esc_html__( 'Main Menu', TMA_DOMAIN ),
        'top-menu' =>   esc_html__( 'Top Menu', TMA_DOMAIN ),
    ] 
);

/*
 * BEM menu items
 */
function tma_bem_nav_menu_css_class( $classes, $item, $args ) {

    // Reset all default classes and start adding custom classes to array
    if ( $args->theme_location === 'main-menu' ) {        
        $_classes[] = 'menu__item';        
    } elseif ( $args->theme_location === 'top-menu' ) {    
        $_classes[] = 'top-menu__item';
    }

    // Add 'has-children' class if menu element contains sub-menu
    if ( in_array( 'menu-item-has-children', $classes ) ) {
        array_push( $_classes, 'has-children' );
    }

    // Include custom classes added by the user
    if ( $item->classes && is_array( $item->classes ) ) {
        $_classes = array_merge( $_classes, $item->classes );
    }

    return $_classes;

}
add_filter( 'nav_menu_css_class', 'tma_bem_nav_menu_css_class', 10, 4 );

/*
 * Menu Anchor Meta Box
 */
// Add "data-anchor" attribute meta box to menu items
function add_menu_item_data_anchor_field( $item_id, $item, $depth, $args ) {
    ?>
    <p class="field-data-anchor description description-wide">
        <label for="edit-menu-item-data-anchor-<?php echo esc_attr( $item_id ); ?>">
            <?php esc_html_e( 'Anchor', TMA_DOMAIN ); ?><br />
            <input type="text" id="edit-menu-item-data-anchor-<?php echo esc_attr( $item_id ); ?>"
                   class="widefat edit-menu-item-data-anchor"
                   name="menu-item-data-anchor[<?php echo esc_attr( $item_id ); ?>]"
                   value="<?php echo esc_attr( get_post_meta( $item->ID, '_menu_item_data_anchor', true ) ); ?>" />
        </label>
    </p>
    <?php
}
add_action( 'wp_nav_menu_item_custom_fields', 'add_menu_item_data_anchor_field', 10, 4 );

// Save "data-anchor" attribute value for menu items
function save_menu_item_data_anchor_field( $menu_id, $menu_item_db_id, $menu_item_args ) {
    if ( isset( $_POST['menu-item-data-anchor'][ $menu_item_db_id ] ) ) {
        $menu_item_data_anchor = sanitize_text_field( $_POST['menu-item-data-anchor'][ $menu_item_db_id ] );
        update_post_meta( $menu_item_db_id, '_menu_item_data_anchor', $menu_item_data_anchor );
    }
}
add_action( 'wp_update_nav_menu_item', 'save_menu_item_data_anchor_field', 10, 3 );

// Add "data-anchor" attribute to menu item markup
function add_menu_item_data_anchor_attribute( $atts, $item, $args ) {
    $data_anchor = get_post_meta( $item->ID, '_menu_item_data_anchor', true );
    if ( $data_anchor ) {
        $atts = [
            'class'         =>  'anchor',
            'data-anchor'   =>  $data_anchor
        ];
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_item_data_anchor_attribute', 10, 3 );