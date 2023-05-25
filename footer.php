<?php 
/*
 * Footer
 */
?>
<footer id="footer" class="footer">
    <img class="footer__logo" 
         src="<?php echo wp_get_attachment_image_src( get_option( 'tma_footer_logo' ), 'full' )[0]; ?>" 
         alt="<?php esc_html_e( get_option( 'tma_footer_logo' ), '_wp_attachment_image_alt', true ); ?>">
    <div class="footer__copyright">
        &copy;&nbsp;<?php echo date('Y'); ?>&nbsp;&#8209;&nbsp;<?php echo get_option( 'tma_footer_copyright_text' ); ?>
    </div>
</footer>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php wp_footer(); ?>