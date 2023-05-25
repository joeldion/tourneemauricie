<?php 
/*
 * Participant Functions
 */
$files = [ 
    'city-selector',
    'create-google-maps-url',
    'region-selector',
    'participant-listing',
    'participant-type-selector',
    'participant-json-data'
];
array_walk( $files, function( $file ) {
    require_once( __DIR__ . '/' . $file . '.php' );
});