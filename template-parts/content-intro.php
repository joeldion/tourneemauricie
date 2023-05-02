<?php 
/*
 * Intro
 */
?>
<section id="intro" class="section intro">
    <div class="section__columns">
        <div class="intro__text">
            <?php echo wpautop( get_option( 'tma_intro_text' ) ); ?>
        </div>
        <div class="intro__image">
            <img src="<?php echo wp_get_attachment_image_url( get_option( 'tma_intro_image' ), 'tma' ); ?>" srcset="<?php echo tma_srcset( get_option( 'tma_intro_image' ) ); ?>" alt="<?php echo bloginfo( 'title' ); ?>" width="700" height="440" loading="lazy">
        </div>
    </div>
</section>