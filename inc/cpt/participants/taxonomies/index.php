<?php 
/*
 * Participant Taxonomies
 */
$taxonomies = [ 'city', 'region', 'type' ];
array_walk($taxonomies, function($tax) {
    require_once( __DIR__ . '/' . $tax . '.php' );
});