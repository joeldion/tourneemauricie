<?php 
/*
 * Participant Meta Boxes
 */
$files = [ 'info', 'location', 'contact', 'page-region' ];
array_walk( $files, function( $file ) {
    require_once( __DIR__ . '/' . $file . '.php' );
});