<?php 
/*
 * Participant Listing
 */
?>
<section id="listing-<?php echo $i; ?>" class="section section--participants">      
    <!-- <div class="section__head">
        <h2 class="section__head-title section__head-title--listing-<?php echo $i; ?>">
            <?php //esc_html_e( get_option( 'tma_participants_section_title_' . $i ) ); ?>
            Participants
        </h2>
    </div>        -->
    <div class="section__columns">
        <?php tma_get_participant_listing( get_post_meta( $post->ID, '_csp_page_region', true ) ); ?>
    </div>
</section>