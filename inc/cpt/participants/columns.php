<?php 
/*
 * Participant city taxonomy "Region" column
 */

// Column Head
function tma_region_column_head($columns) {

    $columns['region'] = esc_html__('Region', TMA_DOMAIN);
    return $columns;

}
add_filter('manage_edit-tma_participant_city_columns', 'tma_region_column_head');

// Column Content
function tma_region_column_content($content, $column_name, $term_id) {

    if ($column_name === 'region') {
        $region_id = get_term_meta($term_id, '_tma_region', true);
        return get_term($region_id)->name;
    }
    return $content;

}
add_action('manage_tma_participant_city_custom_column', 'tma_region_column_content', 10, 3);

// Make Column Sortable
// function tma_region_column_sorting( $query ) {
//     if ( ! is_admin() || ! isset( $query->query['orderby'] ) || $query->query['orderby'] !== '_tma_region' ) {
//         return $query;
//     }
//     $query->set( 'meta_key', '_tma_region' );
//     $query->set( 'orderby', 'meta_value' );
//     return $query;
// }
// add_filter( 'pre_get_terms', 'tma_region_column_sorting' );
// add_filter( 'manage_edit-tma_participant_city_sortable_columns', 'tma_region_column_head' );