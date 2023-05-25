<?php
/*
 * Get Participant Region Selector
 */
function tma_get_participant_region_selector( $saved_region, $field_name = 'tma-region' ) {

    $args = [
        'taxonomy'      =>  'tma_participant_region',
        'orderby'       =>  'slug',
        'order'         =>  'asc',
        'hide_empty'    =>  false,
    ];
    $regions = get_terms( $args );

    ob_start();

    if ( !empty( $regions ) ): 
    ?>
        <select name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>">
        <?php foreach( $regions as $region ): ?>
                <option value="<?php echo $region->term_id; ?>" <?php selected( $saved_region, $region->term_id, true ); ?>>
                    <?php echo $region->name; ?>
                </option>
        <?php endforeach; ?>
        </select>
    <?php 
    endif;

    echo ob_get_clean();

}