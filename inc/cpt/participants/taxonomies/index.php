<?php 
/*
 * Participant Taxonomies
 */
$taxonomies = [ 'city', 'region', 'type' ];
array_walk( $taxonomies, function( $taxonomy ) {
    require_once( __DIR__ . '/' . $taxonomy . '.php' );
});