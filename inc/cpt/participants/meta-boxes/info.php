<?php
/*
 * Participant Meta Box: Info 
 */

add_action( 'add_meta_boxes', 'tma_participant_info_meta_box' );
add_action( 'save_post', 'tma_participant_info_meta_box_save' );

function tma_participant_info_meta_box() {

    add_meta_box(
        'tma_participant_info',
        esc_html__( 'Information', TMA_DOMAIN ),
        'tma_participant_info_callback',
        'tma_participant',
        'normal',
        'high'
    );

}

function tma_participant_info_callback() {

    wp_nonce_field( 'tma_participant_info', 'tma_participant_info_nonce' );

    global $post;
    $id             = $post->ID;
    $short_desc     = esc_html( get_post_meta( $id, '_tma_short_desc', true ) );
    $long_desc      = esc_html( get_post_meta( $id, '_tma_long_desc', true ) );
    ?>
    <table class="form-table tma-form">
        <tbody>
            <tr valign="top">
                <th>
                    <label for="tma-type">
                        <span class="option-title"><?php esc_html_e( 'Type', TMA_DOMAIN ); ?></span>
                    </label>
                </th>
                <td>                    
                    
                    <input type="radio" id="tma-type" name="tma-type" value="">
                </td>
            </tr>
            <tr valign="top">
                <th>
                    <label for="tma-short-desc">
                        <span class="option-title"><?php esc_html_e( 'Short description', TMA_DOMAIN ); ?></span>
                    </label>
                </th>
                <td>                    
                    <input type="text" size="80" id="tma-desc" name="tma-short-desc" value="<?php echo $short_desc; ?>">
                </td>
            </tr>
            <tr valign="top">
                <th>
                    <label for="tma-long-desc">
                        <span class="option-title"><?php esc_html_e( 'Long description', TMA_DOMAIN ); ?></span>
                    </label>
                </th>
                <td>                    
                    <textarea id="tma-long-desc" cols="80" rows="10"  name="tma-long-desc" rows="5"><?php echo $long_desc; ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>
    <?php

}

function tma_participant_info_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'tma_participant_info_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'tma_participant_info_nonce' ];
    if (! wp_verify_nonce( $nonce, 'tma_participant_info' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $data_short_desc = sanitize_text_field( $_POST['tma-short-desc'] );
    $data_long_desc = sanitize_textarea_field( $_POST['tma-long-desc'] );
    update_post_meta( $post_id, '_tma_short_desc', $data_short_desc );
    update_post_meta( $post_id, '_tma_long_desc', $data_long_desc );

}