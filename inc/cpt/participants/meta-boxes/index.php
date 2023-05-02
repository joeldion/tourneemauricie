<?php 
/*
 * Participant Meta Boxes
 */
$meta_boxes = [ 'info', 'location', 'contact' ];
array_walk($meta_boxes, function($meta_box) {
    require_once( __DIR__ . '/' . $meta_box . '.php' );
});