<?php 
/*
 * Google Map
 */
function get_map_json_files() {
    
    $files = scandir( __DIR__ . '/data' );
    
    // Remove the "." and ".." entries from the file list
    $files = array_diff( $files, ['.', '..'] );

    // Convert the file list to an array
    $files = array_values( $files );

    return json_encode( $files );
    // return $files;

}

function get_map_filters() {

    $args = [
        'taxonomy'  =>  'tma_participant_type',
        'orderby'   =>  'slug',
        'order'     =>  'asc'
    ];
    $types = get_terms( $args );

    ob_start();

    if ( !empty($types) ):
        
        ?>
        <div class="map-filters">
            <?php foreach( $types as $type ): ?>
                <div class="map-filter" data-category="<?php echo $type->slug; ?>">
                    <span class="map-filter__checkbox"></span>
                    <span class="map-filter__label"><?php echo $type->name; ?></span>
                </div>
            <?php endforeach; ?>                 
        </div>
        <?php
    endif;

    echo ob_get_clean();

}