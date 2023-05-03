<?php
/*
 * Partner Meta Box: Info 
 */

add_action( 'add_meta_boxes', 'tma_partner_info_meta_box' );
add_action( 'save_post', 'tma_partner_info_meta_box_save' );

function tma_partner_info_meta_box() {

    add_meta_box(
        'tma_partner_info',
        esc_html__( 'Information', TMA_DOMAIN ),
        'tma_partner_info_callback',
        'tma_partner',
        'normal',
        'high'
    );

}

function tma_partner_info_callback() {

    wp_nonce_field( 'tma_partner_info', 'tma_partner_info_nonce' );

    global $post;
    $logo_image_id  = intval( get_post_meta( $post->ID, '_tma_partner_logo', true ) );
    $website        = esc_url( get_post_meta( $post->ID, '_tma_partner_website', true ) );
    ?>
    <table class="form-table tma-form">
        <tbody>
            <tr valign="top">  
                <th>
                    <label for="tma-partner-logo">
                        <span class="option-title"><?php esc_html_e( 'Logo' ); ?></span>
                    </label>
                </th>              
                <td><?php tma_image_uploader( $logo_image_id, 'tma-partner-logo' ); ?></td>                
            </tr>
            <tr valign="top">
                <th>
                    <label for="tma-partner-website">
                        <span class="option-title"><?php esc_html_e( 'Website' ); ?></span>
                    </label>
                </th>
                <td>                    
                    <input type="url" size="80" id="tma-partner-website" name="tma-partner-website" value="<?php echo $website; ?>">
                </td>
            </tr>
        </tbody>
    </table>
    <?php

}

function tma_partner_info_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'tma_partner_info_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'tma_partner_info_nonce' ];
    if (! wp_verify_nonce( $nonce, 'tma_partner_info' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $data_logo = intval( $_POST['tma-partner-logo'] );
    $data_website = sanitize_url( $_POST['tma-partner-website'] );
    update_post_meta( $post_id, '_tma_partner_logo', $data_logo );
    update_post_meta( $post_id, '_tma_partner_website', $data_website );

}