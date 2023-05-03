<?php 
/*
 * Partner Loop
 */
function tma_get_partners() {

    $args = [
        'post_type'     =>  'tma_partner',
        'post_status'   =>  'publish'
    ];
    $partners = new WP_Query( $args );

    while ( $partners->have_posts() ): $partners->the_post();
        $partner = new TMAPartner( get_the_ID() );
        $partner->output();
    endwhile;

}