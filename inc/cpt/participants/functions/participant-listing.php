<?php
/*
 * Participant Listing (loop)
 */
function tma_get_participant_listing( $region_id ) {

    $cities = [];
    $region_cities = get_terms(
                                [
                                    'taxonomy'      =>  'tma_participant_city',
                                    'meta_query'    =>  [
                                        'relation'  =>  'OR',
                                        [
                                            'key'   =>  '_tma_region',
                                            'value' =>  $region_id
                                        ]
                                    ]
                                ]
    );
    foreach ( $region_cities as $city ) {
        array_push( $cities, $city->term_id );
    }

    $args = [
        'post_type'     =>  'tma_participant',
        'post_status'   =>  'publish',
        'order'         =>  'asc',
        'orderby'       =>  'title',
        'tax_query'     =>  [
                                [
                                    'taxonomy'  =>  'tma_participant_city',
                                    'field'     =>  'term_id',
                                    'terms'     =>  $cities
                                ]
                            ]
    ];
    $participants = new WP_Query( $args );

    ob_start();
    $index = 0;
    while ( $participants->have_posts() ): $participants->the_post();
        $participant = new TMAParticipant( get_the_ID(), $index );
        $participant->output();
        $index++;
    endwhile;
    echo ob_get_clean();

}