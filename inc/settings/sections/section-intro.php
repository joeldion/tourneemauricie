<?php 
/*
 * Setting: Intro Text
 */

add_settings_section(
    'tma-settings-intro-section',
    esc_html__('Introduction'),
    'tma_intro_settings_section_callback',
    'tma-settings-page'
);

add_settings_field(
    'tma_intro_text',
    esc_html__('Text'),
    'tma_intro_text_markup',
    'tma-settings-page',
    'tma-settings-intro-section'
);

add_settings_field(
    'tma_intro_image',
    esc_html__('Image'),
    'tma_intro_image_markup',
    'tma-settings-page',
    'tma-settings-intro-section'
);

register_setting('tma-settings', 'tma_intro_text');
register_setting('tma-settings', 'tma_intro_image');

function tma_intro_settings_section_callback() {}

function tma_intro_text_markup() {
    tma_lite_editor('tma_intro_text', get_option('tma_intro_text'));
}

function tma_intro_image_markup() {

    wp_nonce_field('tma_intro_image', 'tma_intro_image_nonce');

    global $post;
    $intro_image_id = get_option('tma_intro_image');
    if ( $intro_image_id > 0 ) $has_image = true;
    $image_preview = $has_image ? wp_get_attachment_image_url($intro_image_id, 'large') : '';
    ?>
    <table class="form-table tma-meta-box">
        <tbody>
            <tr valign="top">                
                <td>
                    <a href="#" class="media-upload-btn button button-secondary" data-target="tma-intro-image">
                        <?php esc_html_e('Upload'); ?>
                    </a>
                    <a href="#" class="media-upload-remove button button-secondary<?php echo $has_image ? ' visible' : ''; ?>" id="tma-intro-image-remove">
                        <?php esc_html_e('Remove'); ?>
                    </a>
                    <br /><br />                    
                    <div class="media-upload__preview<?php echo $has_image ? ' visible' : ''; ?>" id="tma-intro-image-preview" style="background-image: url(<?php echo $image_preview; ?>);">
                    </div>
                    <input type="hidden" name="tma_intro_image" id="tma-intro-image" value="<?php echo $has_image ? $intro_image_id : ''; ?>">
                </td>
            </tr>
        </tbody>
    </table>    
    <?php
}