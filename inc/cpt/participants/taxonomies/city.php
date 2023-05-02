<?php
/*
 * Participant Taxonomy: City
 */

function tma_participant_city_taxonomy() {

    $args = [
            'public'            => false,
            'show_ui'           => true,
            'meta_box_cb'       => false,
            'rewrite'           => [ 'slug' => esc_html( strtolower( _nx('City', 'Cities', 2, 'City name', TMA_DOMAIN ) ) ) ], 
            'capabilities'      => [
                'manage_terms'  => 'manage_options',
                'edit_terms'    => 'manage_options',
                'delete_terms'  => 'manage_options',
                'assign_terms'  => 'manage_options'
            ],
			'labels' => [
    			        'name'                  => esc_html( _nx( 'City', 'Cities', 2, 'City name', TMA_DOMAIN )),
    			        'singular_name'         => esc_html( _nx( 'City', 'Cities', 1, 'City name', TMA_DOMAIN )),
    			        'add_new_item'          => esc_html__( 'Add New City', TMA_DOMAIN ),
    					'new_item_name'         => esc_html__( 'New City', TMA_DOMAIN ),
    			        'edit_item'             => esc_html__( 'Edit City', TMA_DOMAIN ),
    			        'new_item'              => esc_html__( 'New City', TMA_DOMAIN ),
    			        'all_items'             => esc_html__( 'All Cities', TMA_DOMAIN ),
    			        'view_item'             => esc_html__( 'View City', TMA_DOMAIN ),
    					'update_item'           => esc_html__( 'Update City', TMA_DOMAIN ),
    			        'search_items'          => esc_html__( 'Search Cities', TMA_DOMAIN ),
    			        'not_found'             => esc_html__( 'No Cities found', TMA_DOMAIN ),
                        'not_found_in_trash'    => esc_html__( 'No Cities found in trash', TMA_DOMAIN )
			],
    ];
    register_taxonomy( 'tma_participant_city', 'tma_participant', $args );

}
add_action( 'init', 'tma_participant_city_taxonomy' );