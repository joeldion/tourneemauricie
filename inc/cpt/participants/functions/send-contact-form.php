<?php 
/*
 * Send Participant Contact Form
 */

function tma_send_contact_form( $args ) {   
        
        // Email Headers
        $headers  = 'From: Catalogue de Noël <info@maski.quebec>' . "\r\n"; 
        $headers .= 'Reply-To: ' . $args['from_email'] . "\r\n";
        $headers .= 'Bcc: ' . $args['bcc'] . "\r\n";
        $headers .= 'Return-Path: ' . $args['return_path'] . "\r\n";
        $headers .= 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
        $headers .= 'Content-Transfer-Encoding: 8bit' . "\r\n";
        $headers .= 'MIME-Version: 1.0';

        wp_mail( 
            $args['to_email'], 
            $args['subject'], 
            $args['message'], 
            $headers 
        );
    
        // echo '<pre>' . var_export($args['message']) . '</pre>'; 
        // echo '<pre>' . var_export($headers) . '</pre>';    

}