<?php
/*
 * Save Participant data as JSON for Google Map
 */
function tma_save_participant_data_as_json() {

    $types = get_terms([
        'taxonomy'      =>  'tma_participant_type',
        'hide_empty'    =>  true,
    ]);

    $json_file_path = TMA_INC . 'google-map/data/';
    $json_types_file = $json_file_path . 'map-data-types.json';
    $json_file = [];
    $json_data_types = [];

    // Put data in different JSON files for each participant type
    foreach( $types as $type ):

        $args = [
            'post_type'     =>  'tma_participant',
            'post_status'   =>  'publish',
            'order'         =>  'asc',
            'orderby'       =>  'title',
            'tax_query'     =>  [
                                    [
                                        'taxonomy'  =>  'tma_participant_type',
                                        'field'     =>  'term_id',
                                        'terms'     =>  $type->term_id
                                    ]
                                ]
        ];
        $participants = new WP_Query( $args );
        
        $json_file_name = 'map-data-' . $type->slug . '.json';
        $json_file = $json_file_path . $json_file_name;
        $json_data = [];        

        while ( $participants->have_posts() ): $participants->the_post();

            $id = get_the_ID();
            $coord = esc_html( get_post_meta( $id, '_tma_coord', true ) );
            $address = esc_html( get_post_meta( $id, '_tma_address', true ) );
            $city = get_the_terms( $id, 'tma_participant_city' )[0]->name;
            $fulladdress = $address . ', ' . $city;            
            $data = [
                'id'          =>  $id,
                'title'       =>  get_the_title(),
                'address'     =>  $fulladdress,
                'phone'       =>  esc_html( get_post_meta( $id, '_tma_phone', true ) ),
                'email'       =>  esc_html( get_post_meta( $id, '_tma_email', true ) ),
                'website'     =>  esc_url( get_post_meta( $id, '_tma_website', true ) ),
                'gmap_url'    =>  esc_url( get_post_meta( $id, '_tma_gmap_url', true ) ),
                'lat'         =>  floatval( explode( ',', $coord )[0] ),
                'lng'         =>  floatval( explode( ',', $coord )[1] )
            ];

            $data = json_encode( $data );
            array_push( $json_data, $data );

        endwhile;

        // Add map data to JSON files 
        file_put_contents( $json_file, '[' . implode( ',', $json_data ) . ']' );

        // Get 'name' and 'slug' for 'map-data-types.json' file
        $json_data_type = [
            'name'  => $type->name,
            'slug'  => $type->slug
        ];
        $json_data_type = json_encode( $json_data_type );
        array_push( $json_data_types, $json_data_type );

    endforeach;

    // Add JSON files names to 'map-data-types.json' file
    file_put_contents( $json_types_file, '[' . implode( ',', $json_data_types ) . ']' );

}