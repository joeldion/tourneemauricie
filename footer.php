<?php 
/*
 * Footer
 */
?>
<footer id="footer" class="footer">
    <?php /*
    <img class="footer__logo" 
         src="<?php echo wp_get_attachment_image_src( get_option( 'tma_footer_logo' ), 'full' )[0]; ?>" 
         alt="<?php esc_html_e( get_option( 'tma_footer_logo' ), '_wp_attachment_image_alt', true ); ?>">
    */ ?>
    <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/05/logo-miam-fierte.svg" alt="Fierté Miam Mauricie" class="footer__logo" width="13">
    <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/05/logo-tourisme-des-chenaux-1.png" alt="Tourisme Des Chenaux" class="footer__logo">
    <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/05/logo-tourisme-maskinonge.svg" alt="Tourisme Maskinongé" class="footer__logo">
    <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/05/logo-tourisme-mekinac-1.png" alt="Tourisme Mékinac" class="footer__logo">
    <div class="footer__copyright">
        &copy;&nbsp;<?php echo date('Y'); ?>&nbsp;&#8209;&nbsp;<?php echo get_option( 'tma_footer_copyright_text' ); ?>
    </div>
</footer>
<a href="#" class="back-to-top" id="back-to-top"></a>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php wp_footer(); ?>