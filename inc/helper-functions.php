<?php 
/*
 * Helper Functions
 */

function tma_lite_editor($id, $content = '', $rows = 5) {
    return wp_editor(
        $content, 
        $id,
        [
            'media_buttons' => false,
            'quicktags' => false,
            'teeny' => true,
            'textarea_rows' => $rows,
            'tinymce' => [
                'toolbar1' => 'bold italic | bullist numlist',
            ],
            'name'  =>  $id
        ]
    );
}