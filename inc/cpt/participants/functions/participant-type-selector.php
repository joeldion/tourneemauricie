<?php
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