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

/*
 * Region selector
 */
// New taxonomy form
function tma_region_selector_add_form_markup( $term, $taxonomy = 'tma_participant_region' ) {

    $saved_region = get_term_meta( $term->term_id, '_tma_region', true );
    ?>
    <div class="form-field">
        <label for="tma-region">
            <?php echo esc_html( _nx( 'Region', 'Regions', 1, 'Region name', TMA_DOMAIN ) ); ?>
        </label>
        <?php tma_get_participant_region_selector( $saved_region ); ?>
    </div>
    <br>
    <?php

}
add_action( 'tma_participant_city_add_form_fields', 'tma_region_selector_add_form_markup', 10, 2 ); 

// Edit taxonomy form
function tma_region_selector_edit_form_markup( $term, $taxonomy = 'tma_participant_region' ) {

    $saved_region = get_term_meta( $term->term_id, '_tma_region', true );
    ?>
    <tr class="form-field">
        <th>
            <label for="tma-region">
                <?php echo esc_html( _nx( 'Region', 'Regions', 1, 'Region name', TMA_DOMAIN ) ); ?>
            </label>
        </th>
        <td>
            <?php tma_get_participant_region_selector( $saved_region ); ?>
        </td>
    </tr>
    <?php

}
add_action( 'tma_participant_city_edit_form_fields', 'tma_region_selector_edit_form_markup', 10, 2 );

/*
 * Save city region taxonomy
 */
function tma_region_taxonomy_save( $term, $taxonomy = 'tma_participant_region' ) {

    $city = get_term($term);
    $region_data = intval( $_POST['tma-region'] );
    if ( isset($region_data) ) {
        update_term_meta( $city->term_id, '_tma_region', $region_data );
    }

}
// New taxonomy form
add_action( 'created_tma_participant_city', 'tma_region_taxonomy_save', 10, 2 );
// Edit taxonomy form
add_action( 'edited_tma_participant_city', 'tma_region_taxonomy_save', 10, 2 );