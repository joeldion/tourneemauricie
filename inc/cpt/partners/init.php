<?php 
/*
 * Partner CPT
 */
function tma_partner_cpt() {

    $args = [
        'labels'        =>  [
            'name'                  =>  esc_html( _nx('Partner', 'Partners', 2, 'Partner name', 'csp') ),
            'singular_name'         =>  esc_html( _nx('Partner', 'Partners', 1, 'Partner name', 'csp') ),
            'add_new_item'          =>  esc_html__('Add partner', TMA_DOMAIN),
            'edit_item'             =>  esc_html__('Edit partner', TMA_DOMAIN),
            'new_item'              =>  esc_html__('New partner', TMA_DOMAIN),
            'all_items'             =>  esc_html__('All partners', TMA_DOMAIN),
            'view_item'             =>  esc_html__('View partner', TMA_DOMAIN),
            'search_items'          =>  esc_html__('Search partners', TMA_DOMAIN),
            'not_found'             =>  esc_html__('No partners found', TMA_DOMAIN),
            'not_found_in_trash'    =>  esc_html__('No partners found in trash', TMA_DOMAIN),
            'menu_item'             =>  esc_html( _nx('Partner', 'Partners', 2, 'Partner name', 'csp') )
        ],
        'rewrite'                   => [ 'slug' => esc_html__('partner', 'csp') ],
        'public'                    =>  true,
        'supports'                  =>  ['title'],
        'menu_position'             =>  5,
        'menu_icon'                 =>  'dashicons-networking'
    ];

    register_post_type('tma_partner', $args);

}
add_action('init', 'tma_partner_cpt', 9);

/*
 * Includes
 */
$includes = [
    'classes',
    'meta-boxes'
];
foreach ($includes as $inc) {
    require_once(__DIR__ . '/' . $inc . '.php');
}