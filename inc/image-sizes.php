<?php
/*
 * Custom Image Sizes
 */

function tma_image_sizes() {
    add_image_size( 'tma', 600, 400 );
    add_image_size( 'tma-2x', 1200, 800 );
    add_filter('big_image_size_threshold', '__return_false');
}
add_action( 'after_setup_theme', 'tma_image_sizes' );