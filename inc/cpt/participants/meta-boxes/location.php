<?php
/*
 * Participant Meta Box: Location 
 */

add_action( 'add_meta_boxes', 'tma_participant_location_meta_box' );
add_action( 'save_post', 'tma_participant_location_meta_box_save' );

function tma_participant_location_meta_box() {

    add_meta_box(
        'tma_participant_location',
        esc_html__( 'Location', TMA_DOMAIN ),
        'tma_participant_location_callback',
        'tma_participant',
        'normal',
        'high'
    );

}

function tma_participant_location_callback() {

    wp_nonce_field( 'tma_participant_location', 'tma_participant_location_nonce' );

    global $post;
    $id             = $post->ID;
    $address        = esc_html( get_post_meta( $id, '_tma_address', true ) );
    $postal_code    = esc_html( get_post_meta( $id, '_tma_postal_code', true ) );
    $gmap_url       = esc_url( get_post_meta( $id, '_tma_gmap_url', true ) );
    $coord          = esc_html( get_post_meta( $id, '_tma_coord', true ) );
    // $lat            = intval( explode( ',', $coord )[0] );
    // $lng            = intval( explode( ',', $coord )[1] );
    ?>
    <table class="form-table tma-form">
        <tbody>
            <tr valign="top">
                <th>
                    <label for="tma-address">
                        <span class="option-title"><?php esc_html_e( 'Civic Address', TMA_DOMAIN ); ?></span>
                    </label>
                </th>
                <td>
                    <input type="text" size="50" id="tma-address" name="tma-address" value="<?php echo $address; ?>">
                </td>
            </tr>
            <tr valign="top">
                <th>
                    <label for="tma-city">
                        <span class="option-title"><?php esc_html_e( 'City / Town', TMA_DOMAIN ); ?></span>
                    </label>
                </th>
                <td>
                    <?php tma_get_participant_city_selector($id); ?>
                </td>
            </tr>
            <tr valign="top">
                <th>
                    <label for="tma-postal-code">
                        <span class="option-title"><?php esc_html_e( 'Postal Code', TMA_DOMAIN ); ?></span>
                    </label>
                </th>
                <td>
                    <input type="text" size="50" id="tma-postal-code" name="tma-postal-code" value="<?php echo $postal_code; ?>">
                </td>
            </tr>
            <tr valign="top">
                <th>
                    <label for="tma-gmap-url">
                        <span class="option-title"><?php esc_html_e( 'Google Maps URL', TMA_DOMAIN ); ?></span>
                    </label>
                </th>
                <td>
                    <input type="url" size="50" id="tma-gmap-url" name="tma-gmap-url" value="<?php echo $gmap_url; ?>">
                </td>
            </tr>        
        </tbody>
    </table>
    <input type="hidden" id="tma-coord" name="tma-coord" value="<?php echo $coord; ?>">
    <?php

}

function tma_participant_location_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'tma_participant_location_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'tma_participant_location_nonce' ];
    if (! wp_verify_nonce( $nonce, 'tma_participant_location' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $data_region = sanitize_textarea_field( $_POST[ 'tma-region' ] );
    $data_address = sanitize_text_field( $_POST[ 'tma-address' ] );
    $data_city = intval( $_POST[ 'tma-city' ] );
    $data_postal_code = sanitize_text_field( $_POST[ 'tma-postal-code' ] );
    $data_gmap_url = sanitize_text_field( $_POST[ 'tma-gmap-url' ] );    
    $data_coord = sanitize_text_field( $_POST[ 'tma-coord' ] );
    update_post_meta( $post_id, '_tma_region', $data_region );
    update_post_meta( $post_id, '_tma_address', $data_address );
    wp_set_object_terms( $post_id, $data_city, 'tma_participant_city' );
    update_post_meta( $post_id, '_tma_postal_code', $data_postal_code );
    update_post_meta( $post_id, '_tma_gmap_url', $data_gmap_url );
    update_post_meta( $post_id, '_tma_coord', $data_coord );

}