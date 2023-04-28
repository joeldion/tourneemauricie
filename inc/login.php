<?php
/*
 * Custom login screen
 */

function tma_custom_login_logo() {
    ?>
    <style type="text/css">
        body {
            background: #fff !important;
        }
        h1 a {
            background-image:url(<?php echo TMA_LOGO_SRC; ?>) !important;
            background-size: 100% !important;
            width: 200px !important;
            height: 130px !important;
        }
    </style>
    <?php
}
add_filter( 'login_head', 'tma_custom_login_logo' );