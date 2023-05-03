<?php 
/*
 * Participant CPT
 */
function tma_participant_cpt() {

    $args = [
        'labels'        =>  [
            'name'                  =>  esc_html( _nx( 'Participant', 'Participants', 2, 'Participant name', TMA_DOMAIN ) ),
            'singular_name'         =>  esc_html( _nx( 'Participant', 'Participants', 1, 'Participant name', TMA_DOMAIN ) ),
            'add_new_item'          =>  esc_html__( 'Add Participant', TMA_DOMAIN ),
            'edit_item'             =>  esc_html__( 'Edit Participant', TMA_DOMAIN ),
            'new_item'              =>  esc_html__( 'New Participant', TMA_DOMAIN ),
            'all_items'             =>  esc_html__( 'All Participants', TMA_DOMAIN ),
            'view_item'             =>  esc_html__( 'View Participant', TMA_DOMAIN ),
            'search_items'          =>  esc_html__( 'Search Participants', TMA_DOMAIN ),
            'not_found'             =>  esc_html__( 'No Participants found', TMA_DOMAIN ),
            'not_found_in_trash'    =>  esc_html__( 'No Participants found in trash', TMA_DOMAIN ),
            'menu_item'             =>  esc_html( _nx( 'Participant', 'Participants', 2, 'Participant name', TMA_DOMAIN ) )
        ],
        'rewrite'       => [ 'slug' => esc_html( strtolower( _nx( 'Participant', 'Participants', 1, 'Participant name', TMA_DOMAIN ) ) ) ],
        'public'        =>  false,
        'show_ui'       =>  true,
        'supports'      =>  [ 'title', 'thumbnail' ],
        'menu_position' =>  5,
        'menu_icon'     =>  'dashicons-store'
    ];

    register_post_type( 'tma_participant', $args );

}
add_action( 'init', 'tma_participant_cpt', 9 );

/*
 * Includes
 */
$includes = [
    'classes',
    'columns',
    'functions',
    'meta-boxes/index',
    'taxonomies/index'
];
foreach ( $includes as $inc ) {
    require_once( __DIR__ . '/' . $inc . '.php' );
}