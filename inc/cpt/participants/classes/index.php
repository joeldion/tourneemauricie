<?php 
/*
 * Participant Classes
 */
$files = [ 'participant', 'contact-form', 'contact-form-success' ];
array_walk( $files, function( $file ) {
    require_once( __DIR__ . '/' . $file . '.php' );
});