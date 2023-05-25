<?php
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
    $cities = get_terms( $args );
    $saved_city = get_the_terms( $post_id, 'tma_participant_city' )[0];
    
    ob_start();

    if ( !empty($cities) ):        
    ?>
        <select name="tma-city" id="tma-city">
        <?php foreach( $cities as $city ): ?>
                <option value="<?php echo $city->term_id; ?>" <?php selected( $saved_city->term_id, $city->term_id, true ); ?>>
                    <?php echo $city->name; ?>
                </option>
        <?php endforeach; ?>
        </select>
        <input type="hidden" id="tma-saved-city" name="tma-saved-city" value="<?php echo $saved_city->name; ?>">
    <?php 
    endif;

    echo ob_get_clean();

}