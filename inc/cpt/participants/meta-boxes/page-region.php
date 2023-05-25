<?php
/* 
 * Participants Page Region Selector Meta Box
 */

add_action( 'add_meta_boxes_page', 'tma_participants_page_meta_box' );
add_action( 'save_post', 'tma_participants_page_meta_box_save' );

function tma_participants_page_meta_box( $post ) {
    if ( get_post_meta( $post->ID, '_wp_page_template', true ) === 'page-participants.php' ) {
        add_meta_box(
            'page_region',
            esc_html( _nx( 'Region', 'Regions', 1, 'Region name', TMA_DOMAIN ) ),
            'tma_participants_page_meta_box_callback',
            'page',
            'side',
            'high'
        );
    }
}

function tma_participants_page_meta_box_callback( $post ) {

    wp_nonce_field( 'csp_page_region', 'csp_page_region_nonce' );
    $region = intval( get_post_meta( $post->ID, '_csp_page_region', true ) );
    tma_get_participant_region_selector( $region, 'page-region' );

}

function tma_participants_page_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'csp_page_region_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'csp_page_region_nonce' ];
    if (! wp_verify_nonce( $nonce, 'csp_page_region' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    update_post_meta( $post_id, '_csp_page_region', intval( $_POST['page-region'] ) );

}