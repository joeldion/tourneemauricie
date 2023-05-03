<?php 
/*
 * Partner CPT
 */
function tma_partner_cpt() {

    $args = [
        'labels'        =>  [
            'name'                  =>  esc_html( _nx( 'Partner', 'Partners', 2, 'Partner name', TMA_DOMAIN ) ),
            'singular_name'         =>  esc_html( _nx( 'Partner', 'Partners', 1, 'Partner name', TMA_DOMAIN ) ),
            'add_new_item'          =>  esc_html__( 'Add Partner', TMA_DOMAIN ),
            'edit_item'             =>  esc_html__( 'Edit Partner', TMA_DOMAIN ),
            'new_item'              =>  esc_html__( 'New Partner', TMA_DOMAIN ),
            'all_items'             =>  esc_html__( 'All Partners', TMA_DOMAIN ),
            'view_item'             =>  esc_html__( 'View Partner', TMA_DOMAIN ),
            'search_items'          =>  esc_html__( 'Search Partners', TMA_DOMAIN ),
            'not_found'             =>  esc_html__( 'No Partners found', TMA_DOMAIN),
            'not_found_in_trash'    =>  esc_html__( 'No Partners found in trash', TMA_DOMAIN ),
            'menu_item'             =>  esc_html( _nx( 'Partner', 'Partners', 2, 'Partner name', TMA_DOMAIN ) )
        ],
        'rewrite'                   => [ 'slug' => esc_html( strtolower( _nx( 'Partner', 'Partners', 1, 'Partner name', TMA_DOMAIN ) ) ) ],
        'public'                    =>  false,
        'show_ui'                   =>  true,
        'supports'                  =>  [ 'title' ],
        'menu_position'             =>  5,
        'menu_icon'                 =>  'dashicons-networking'
    ];

    register_post_type( 'tma_partner', $args );

}
add_action( 'init', 'tma_partner_cpt', 9 );

/*
 * Includes
 */
$includes = [
    'classes',
    'functions',
    'meta-boxes/index'
];
foreach ( $includes as $inc ) {
    require_once( __DIR__ . '/' . $inc . '.php' );
}