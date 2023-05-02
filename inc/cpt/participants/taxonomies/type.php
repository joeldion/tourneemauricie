<?php
/*
 * Participant Taxonomy: Participant Type
 */

function tma_participant_type_taxonomy() {

    $args = [
            'public'            => false,
            'show_ui'           => true,
            'meta_box_cb'       => false,
            'rewrite'           => [ 'slug' => esc_html( strtolower( _nx('Participant Type', 'Participant Types', 2, 'Participant Type name', TMA_DOMAIN ) ) ) ], 
            'capabilities'      => [
                'manage_terms'  => 'manage_options',
                'edit_terms'    => 'manage_options',
                'delete_terms'  => 'manage_options',
                'assign_terms'  => 'manage_options'
            ],
			'labels' => [
    			        'name'                  => esc_html( _nx('Type', 'Types', 2, 'Participant Type name', TMA_DOMAIN )),
    			        'singular_name'         => esc_html( _nx('Type', 'Types', 1, 'Participant Type name', TMA_DOMAIN )),
    			        'add_new_item'          => esc_html__(' Add New Participant Type', TMA_DOMAIN ),
    					'new_item_name'         => esc_html__(' New Participant Type', TMA_DOMAIN ),
    			        'edit_item'             => esc_html__(' Edit Participant Type', TMA_DOMAIN ),
    			        'new_item'              => esc_html__(' New Participant Type', TMA_DOMAIN ),
    			        'all_items'             => esc_html__(' All Participant Types', TMA_DOMAIN ),
    			        'view_item'             => esc_html__(' View Participant Type', TMA_DOMAIN ),
    					'update_item'           => esc_html__(' Update Participant Type', TMA_DOMAIN ),
    			        'search_items'          => esc_html__(' Search Participant Types', TMA_DOMAIN ),
    			        'not_found'             => esc_html__(' No Participant Types found', TMA_DOMAIN ),
                        'not_found_in_trash'    => esc_html__(' No Participant Types found in trash', TMA_DOMAIN )
			],
    ];
    register_taxonomy( 'tma_participant_type', 'tma_participant', $args );

}
add_action( 'init', 'tma_participant_type_taxonomy' );