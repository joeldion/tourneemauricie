<?php 

/*
 * Add SVG support
 */
function tma_add_svg_support( $data, $file, $filename, $mimes ) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}
add_filter( 'wp_check_filetype_and_ext', 'tma_add_svg_support', 10, 4 );
  
function tma_cc_mime_types( $mimes ) {

    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
    
}
add_filter( 'upload_mimes', 'tma_cc_mime_types' );

function tma_fix_svg() {
    echo '<style type="text/css">
            .attachment-266x266, .thumbnail img {
                width: 100% !important;
                height: auto !important;
            }
          </style>';
}
add_action( 'admin_head', 'tma_fix_svg' );