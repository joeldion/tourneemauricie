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
    $coord_adjust   = esc_html( get_post_meta( $id, '_tma_coord_adjust', true ) );
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
                    <?php tma_get_participant_city_selector( $id ); ?>
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
                    <?php if ( !empty( $gmap_url ) ): ?>
                        <a href="<?php echo $gmap_url; ?>" target="_blank"><span class="dashicons dashicons-external"></span></a>
                    <?php endif; ?>
                </td>
            </tr>
            <tr valign="top">
                <th>
                    <label for="tma-coord">
                        <span class="option-title"><?php esc_html_e( 'Coordinates', TMA_DOMAIN ); ?></span>
                    </label>
                </th>
                <td>
                    <input type="text" size="50" id="tma-coord" name="tma-coord" value="<?php echo $coord; ?>">
                    <p>
                        <input type="checkbox" id="tma-coord-adjust" name="tma-coord-adjust" value="1" <?php checked( '1', $coord_adjust, true ); ?>>
                        &nbsp;<?php esc_html_e( 'Adjust coordinates', TMA_DOMAIN ); ?>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
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

    $address = sanitize_text_field( $_POST[ 'tma-address' ] );
    $city = intval( $_POST[ 'tma-city' ] );
    $postal_code = sanitize_text_field( $_POST[ 'tma-postal-code' ] );
    $gmap_url = sanitize_text_field( $_POST[ 'tma-gmap-url' ] );
    if ( empty( $gmap_url ) ) {
        $gmap_url = tma_create_google_maps_url( $address, $city, $postal_code );
    }
    $coord = sanitize_text_field( str_replace( ' ', '', $_POST[ 'tma-coord' ] ) );
    $coord_adjust = intval( $_POST[ 'tma-coord-adjust' ] );
    update_post_meta( $post_id, '_tma_address', $address );
    wp_set_object_terms( $post_id, $city, 'tma_participant_city' );
    update_post_meta( $post_id, '_tma_postal_code', $postal_code );
    update_post_meta( $post_id, '_tma_gmap_url', $gmap_url );
    update_post_meta( $post_id, '_tma_coord', $coord );
    update_post_meta( $post_id, '_tma_coord_adjust', $coord_adjust );

    // Add data to JSON files for Google Map
    tma_save_participant_data_as_json();

}