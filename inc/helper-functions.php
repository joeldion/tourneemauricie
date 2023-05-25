<?php 
/*
 * Helper Functions
 */

// Lite Text Editor for admin settings 
function tma_lite_editor($id, $content = '', $rows = 10) {

    return wp_editor(
        $content, 
        $id,
        [
            'name'          =>  $id,
            'media_buttons' => false,
            'quicktags'     => false,
            'teeny'         => true,
            'textarea_rows' => $rows,
            'tinymce'       => [ 'toolbar1' => 'bold italic | bullist numlist' ]            
        ]
    );
    
}

// Allowed HTML tags in Lite Text Editor
function tma_sanitize_lite_editor_field( $field ) {

    $allowed_tags = [
        'p'       =>  [],
        'strong'  =>  [],
        'em'      =>  [],
        'ul'      =>  [],
        'ol'      =>  [],
        'li'      =>  []
    ];
    return wp_kses( $field, $allowed_tags );
    
}

// Get site logo URL for image "src" attribute
function tma_logo_src() {
    if ( get_theme_mod( 'custom_logo' ) ) {
        return esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] );
    }
}

// Get "srcset" for images
function tma_srcset( $image_id, $size_name = 'tma' ) {

    $url_1x = wp_get_attachment_image_url( $image_id, $size_name );
    $url_2x = wp_get_attachment_image_url( $image_id, $size_name . '-2x' );
    $srcset = $url_1x . ' 1x,' . $url_2x . ' 2x';
    return $srcset;

}

// Simple image uploader for admin settings
function tma_image_uploader( $image_id, $image_name ) {

    $has_image = $image_id > 0 ? true : false;
    $image_preview = $has_image ? wp_get_attachment_image_url( $image_id, 'large' ) : '';
    ob_start();
    ?>
    <a href="#" class="media-upload-btn button button-secondary" data-target="<?php echo $image_name; ?>">
        <?php esc_html_e( 'Upload' ); ?>
    </a>
    <a href="#" class="media-upload-remove button button-secondary<?php echo $has_image ? ' visible' : ''; ?>" id="<?php echo $image_name; ?>-remove">
        <?php esc_html_e( 'Remove' ); ?>
    </a>
    <br /><br />                    
    <div class="media-upload__preview<?php echo $has_image ? ' visible' : ''; ?>" id="<?php echo $image_name; ?>-preview" style="background-image: url(<?php echo $image_preview; ?>);">
    </div>
    <input type="hidden" name="<?php echo $image_name; ?>" id="<?php echo $image_name; ?>" value="<?php echo $has_image ? $image_id : ''; ?>">
    <?php
    echo ob_get_clean();

}

// Format phone number
function tma_format_phone( $number, $format = '' ) {

    if ( $format === 'href' ) {
        // Remove spaces and "-" for "href" attribute use
        $pattern = [ '/^1?\s+/', '/\-|\s+/' ];
        $replace = [ '', '', ];
    } else {
        // Replace "-" with non-breaking hyphens (&#8209;) and spaces with non-breaking spaces (&nbsp;)
        $pattern = [ '/\-+/', '/\s+/' ];
        $replace = [ '&#8209;', '&nbsp;' ];
    }

    $output = preg_replace( $pattern, $replace, $number );
    // Add "tel:+1" before formatted phone number for "href" use
    if ( $format === 'href' ) $output = 'tel:+1' . $output;

    echo $output;

}