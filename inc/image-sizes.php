<?php
/*
 * Custom Image Sizes
 */

function tma_image_sizes() {
    $crop = [ 'center', 'top' ];
    add_image_size( 'tma', 600, 400, $crop );
    add_image_size( 'tma-2x', 1200, 800, $crop );
    add_image_size( 'tma-logo', 300, 150 );
    add_image_size( 'tma-logo-2x', 600, 300 );
    add_filter('big_image_size_threshold', '__return_false');
}
add_action( 'after_setup_theme', 'tma_image_sizes' );