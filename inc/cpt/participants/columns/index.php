<?php 
/*
 * Participant Columns
 */
$files = [ 'city-region' ];
array_walk( $files, function( $file ) {
    require_once( __DIR__ . '/' . $file . '.php' );
});