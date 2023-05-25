<?php
/*
 * Get Participant Email for Contact Form
 */

add_action( 'wp_ajax_tma_get_participant_email', 'tma_get_participant_email' );
add_action( 'wp_ajax_nopriv_tma_get_participant_email', 'tma_get_participant_email' );

function tma_get_participant_email() {

    $attachment = (object)[];
    if ( isset( $_POST[ 'attachment_id' ] ) ) {
        $attachment->id = intval( $_POST[ 'attachment_id' ] );
        $attachment->url = wp_get_attachment_url( $attachment->id );
        echo json_encode( $attachment );        
    }
    exit();

}