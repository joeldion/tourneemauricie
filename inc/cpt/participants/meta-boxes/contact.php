<?php
/*
 * Participant Meta Box: Contact
 */

add_action( 'add_meta_boxes', 'tma_participant_contact_meta_box' );
add_action( 'save_post', 'tma_participant_contact_meta_box_save' );

function tma_participant_contact_meta_box() {

    add_meta_box(
        'tma_participant_contact',
        esc_html__( 'Contact' ),
        'tma_participant_contact_callback',
        'tma_participant',
        'normal',
        'high'
    );

}

function tma_participant_contact_callback() {

    wp_nonce_field( 'tma_participant_contact', 'tma_participant_contact_nonce' );

    global $post;
    $id             = $post->ID;
    $phone          = esc_html( get_post_meta( $id, '_tma_phone', true ) );
    $email          = esc_html( get_post_meta( $id, '_tma_email', true ) );
    $website        = esc_url( get_post_meta( $id, '_tma_website', true ) );
    ?>
    <table class="form-table tma-form">
        <tbody>
            <tr valign="top">
                <th>
                    <label for="tma-phone">
                        <span class="option-title"><?php esc_html_e('Phone', TMA_DOMAIN); ?></span>
                    </label>
                </th>
                <td>
                    <input type="tel" size="50" id="tma-phone" name="tma-phone" value="<?php echo $phone; ?>">
                </td>
            </tr>
            <tr valign="top">
                <th>
                    <label for="tma-email">
                        <span class="option-title"><?php esc_html_e('Email'); ?></span>
                    </label>
                </th>
                <td>
                    <input type="email" size="80" id="tma-email" name="tma-email" value="<?php echo $email; ?>">
                </td>
            </tr>
            <tr valign="top">
                <th>
                    <label for="tma-website">
                        <span class="option-title"><?php esc_html_e('Website'); ?></span>
                    </label>
                </th>
                <td>
                    <input type="url" id="tma-website" name="tma-website" value="<?php echo $website; ?>">
                </td>
            </tr>
        </tbody>
    </table>
    <?php

}

function tma_participant_contact_meta_box_save( $post_id ) {

    if (! isset($_POST[ 'tma_participant_contact_nonce' ])) {
        return $post_id;
    }
    $nonce = $_POST[ 'tma_participant_contact_nonce' ];
    if (! wp_verify_nonce( $nonce, 'tma_participant_contact' )) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if (! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $data_phone = sanitize_text_field( $_POST[ 'tma-phone' ] );
    $data_email = sanitize_email( $_POST[ 'tma-email' ] );
    $data_website = sanitize_text_field( $_POST[ 'tma-website' ] );
    update_post_meta( $post_id, '_tma_phone', $data_phone );
    update_post_meta( $post_id, '_tma_email', $data_email );
    update_post_meta( $post_id, '_tma_website', $data_website );

}