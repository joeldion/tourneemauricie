<?php
/*
 * Participant Taxonomy: Region
 */

function tma_participant_region_taxonomy() {

    $args = [
            'public'            => false,
            'show_ui'           => true,
            'meta_box_cb'       => false,
            'rewrite'           => [ 'slug' => esc_html( strtolower( _nx( 'Region', 'Regions', 2, 'Region name', TMA_DOMAIN ) ) ) ], 
            'capabilities'      => [
                'manage_terms'  => 'manage_options',
                'edit_terms'    => 'manage_options',
                'delete_terms'  => 'manage_options',
                'assign_terms'  => 'manage_options'
            ],
            'labels' => [
                        'name'                  => esc_html( _nx( 'Region', 'Regions', 2, 'Region name', TMA_DOMAIN ) ),
                        'singular_name'         => esc_html( _nx( 'Region', 'Regions', 1, 'Region name', TMA_DOMAIN ) ),
                        'add_new_item'          => esc_html__( 'Add New Region', TMA_DOMAIN ),
                        'new_item_name'         => esc_html__( 'New Region', TMA_DOMAIN ),
                        'edit_item'             => esc_html__( 'Edit Region', TMA_DOMAIN ),
                        'new_item'              => esc_html__( 'New Region', TMA_DOMAIN ),
                        'all_items'             => esc_html__( 'All Regions', TMA_DOMAIN ),
                        'view_item'             => esc_html__( 'View Region', TMA_DOMAIN ),
                        'update_item'           => esc_html__( 'Update Region', TMA_DOMAIN ),
                        'search_items'          => esc_html__( 'Search Regions', TMA_DOMAIN ),
                        'not_found'             => esc_html__( 'No Regions found', TMA_DOMAIN ),
                        'not_found_in_trash'    => esc_html__( 'No Regions found in trash', TMA_DOMAIN )
            ],
    ];
    register_taxonomy( 'tma_participant_region', 'tma_participant', $args );

}
add_action( 'init', 'tma_participant_region_taxonomy' );