<?php
/*
 * Create Google Maps URL
 */
function tma_create_google_maps_url( $address, $city, $postal_code ) {  
    $city = get_term_by( 'term_id', $city, 'tma_participant_city' )->name;  
    $formatted_address = preg_replace( '/\s|\-/', '+', $address . '+' . $city . '+' . $postal_code );
    return 'https://www.google.com/maps/place/' . $formatted_address;
}