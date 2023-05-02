<?php 
/*
 * Helper Functions
 */

function tma_lite_editor($id, $content = '', $rows = 5) {

    return wp_editor(
        $content, 
        $id,
        [
            'media_buttons' => false,
            'quicktags' => false,
            'teeny' => true,
            'textarea_rows' => $rows,
            'tinymce' => [
                'toolbar1' => 'bold italic | bullist numlist',
            ],
            'name'  =>  $id
        ]
    );
    
}

function tma_logo_src() {

    if (get_theme_mod( 'custom_logo' )) {
        return esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] );
    }

}


function tma_srcset( $image_id ) {

    $url_1x = wp_get_attachment_image_url( $image_id, 'tma' );
    $url_2x = wp_get_attachment_image_url( $image_id, 'tma-2x' );
    $srcset = $url_1x . ' 1x,' . $url_2x . ' 2x';
    return $srcset;

}