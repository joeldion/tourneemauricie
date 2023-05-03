<?php
/*
 * Get Participant Region Selector
 */
function tma_get_participant_region_selector( $term ) {

    $args = [
        'taxonomy'      =>  'tma_participant_region',
        'orderby'       =>  'slug',
        'order'         =>  'asc',
        'hide_empty'    =>  false,
    ];
    $regions = get_terms($args);
    $saved_region = get_term_meta( $term->term_id, '_tma_region', true );

    ob_start();

    if (!empty($regions)): 
    ?>
        <select name="tma-region" id="tma-region">
        <?php foreach($regions as $region): ?>
                <option value="<?php echo $region->term_id; ?>" <?php selected( $saved_region, $region->term_id, true ); ?>>
                    <?php echo $region->name; ?>
                </option>
        <?php endforeach; ?>
        </select>
    <?php 
    endif;

    echo ob_get_clean();

}

/*
 * Get Participant City Selector
 */
function tma_get_participant_city_selector( $post_id ) {

    $args = [
        'taxonomy'      =>  'tma_participant_city',
        'orderby'       =>  'slug',
        'order'         =>  'asc',
        'hide_empty'    =>  false,
    ];
    $types = get_terms( $args );
    $saved_city = get_the_terms( $post_id, 'tma_participant_city' )[0];
    
    ob_start();

    if ( !empty($types) ):        
    ?>
        <select name="tma-city" id="tma-city">
        <?php foreach( $types as $city ): ?>
                <option value="<?php echo $city->term_id; ?>" <?php selected( $saved_city->term_id, $city->term_id, true ); ?>>
                    <?php echo $city->name; ?>
                </option>
        <?php endforeach; ?>
        </select>
    <?php 
    endif;

    echo ob_get_clean();

}

/*
 * Get Participant Type Selector
 */
function tma_get_participant_type_selector( $post_id ) {

    $args = [
        'taxonomy'      =>  'tma_participant_type',
        'orderby'       =>  'slug',
        'order'         =>  'asc',
        'hide_empty'    =>  false,
    ];
    $types = get_terms($args);
    $saved_type = get_the_terms( $post_id, 'tma_participant_type')[0];

    ob_start();

    if (!empty($types)): 
    ?>
        <select name="tma-type" id="tma-type">
        <?php foreach($types as $type): ?>
                <option value="<?php echo $type->term_id; ?>" <?php selected( $saved_type->term_id, $type->term_id, true ); ?>>
                    <?php echo $type->name; ?>
                </option>
        <?php endforeach; ?>
        </select>
    <?php 
    endif;

    echo ob_get_clean();

}