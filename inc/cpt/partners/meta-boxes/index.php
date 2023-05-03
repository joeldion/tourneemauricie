<?php 
/*
 * Partner Meta Boxes
 */
$meta_boxes = [ 'info' ];
array_walk($meta_boxes, function($meta_box) {
    require_once( __DIR__ . '/' . $meta_box . '.php' );
});