<?php 
/*
 * Classes
 */

class TMAPartner {

    private $id;

    public function __construct( $id ) {

        $this->id = intval( $id );
        $this->img_id = intval( get_post_meta( $id, '_tma_partner_logo', true ) );
        $this->img_src = wp_get_attachment_image_url( $this->img_id, 'tma-logo' );        
        $this->img_srcset = tma_srcset( $this->img_id, 'tma-logo' );
        if ( empty( $this->img_id ) ) {
            $this->img_src = 'data:image/png;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
            $this->img_srcset = $this->img_src . ' 1x, '. $this->img_src . ' 2x';
        }
        $this->title = get_the_title( $this->id );
        $this->website = esc_url( get_post_meta( $this->id, '_tma_partner_website', true ) );

    }

    public function output() {
        ?>
        <div class="partner">
            <a href="<?php echo $this->website; ?>" target="_blank">
                <img class="partner__logo" src="<?php echo $this->img_src; ?>" srcset="<?php echo $this->img_srcset; ?>" alt="<?php echo $this->title; ?>" width="200" height="100" loading="lazy">
            </a>
        </div>
        <?php      

    }

}