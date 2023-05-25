<?php 
/*
 * Intro
 */
?>
<section id="intro" class="section section--intro">
    <div class="section__columns">
        <div class="section__text">
            <?php echo wpautop( get_option( 'tma_intro_text' ) ); ?>
            <a class="intro__btn tma-btn" href="<?php echo esc_url( get_option('tma_intro_btn_link') ); ?>">
                <?php esc_html_e( get_option('tma_intro_btn_text') ); ?>
            </a>
        </div>
        <div class="section__image">
            <img src="<?php echo wp_get_attachment_image_url( get_option( 'tma_intro_image' ), 'tma' ); ?>" srcset="<?php echo tma_srcset( get_option( 'tma_intro_image' ) ); ?>" alt="<?php echo bloginfo( 'title' ); ?>" width="700" height="440" loading="lazy">
        </div>
    </div>
</section>