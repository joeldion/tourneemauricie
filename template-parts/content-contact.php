<?php 
/*
 * Contact
 */
?>
<section id="contact" class="section section--contact">
    <div class="section__head">
        <h2 class="section__head-title"><?php esc_html_e( get_option( 'tma_contact_title' ) ); ?></h2>
    </div>
    <div class="contact">
        <p>
            <a href="<?php tma_format_phone( get_option('tma_contact_phone'), 'href' ); ?>" class="contact__item">
            <?php tma_format_phone( get_option('tma_contact_phone') ); ?>
            </a>
        </p>
        <p>
            <a href="mailto:<?php esc_html_e( get_option('tma_contact_email') ); ?>" class="contact__item">
                <?php esc_html_e( get_option('tma_contact_email') ); ?>
            </a>
        </p>
    </div>
</section>