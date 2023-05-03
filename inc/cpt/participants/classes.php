<?php 
/*
 * Classes
 */

class TMAParticipant {

    private $id;

    public function __construct( $id ) {

        $this->id = intval( $id );
        $this->img_id = get_post_thumbnail_id( $this->id );
        $this->img_src = wp_get_attachment_image_url( $this->img_id, 'tma' );        
        $this->img_srcset = tma_srcset( $this->img_id );

        if ( empty( $this->img_id ) ) {
            $this->img_src = 'data:image/png;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
            $this->img_srcset = $this->img_src . ' 1x, '. $this->img_src . ' 2x';
        }

        $this->title = get_the_title( $this->id );
        $this->short_desc = esc_html( get_post_meta( $this->id, '_tma_desc', true ) );
        $this->long_desc = wpautop( get_post_meta( $this->id, '_tma_long_desc', true ) );
        $this->region = esc_html( get_post_meta( $this->id, '_tma_region', true ) );
        $this->address = esc_html( get_post_meta( $this->id, '_tma_address', true ) );        
        $this->city = esc_html( get_post_meta( $this->id, '_tma_city', true ) );
        $this->postal_code = esc_html( get_post_meta( $this->id, '_tma_postal_code', true ) );
        $this->full_address = $this->address . ', ' . $this->city . ' ' . $this->postal_code;
        $this->gmap_url = esc_url( get_post_meta( $this->id, '_tma_gmap_url', true ) );
        $this->phone = esc_html( get_post_meta( $this->id, '_tma_phone', true ) );
        $this->email = esc_html( get_post_meta( $this->id, '_tma_email', true ) );
        $this->website = esc_url( get_post_meta( $this->id, '_tma_website', true ) );

    }

    public function address_href( $address ) {

        if ( !empty( $this->gmap_url ) ) return $this->gmap_url;
        $find = [ '/,/', '/\s/' ];
        $replace = [ '', '+' ];
        return 'https://www.google.com/maps?q=' . preg_replace( $find, $replace, $address );

    }

    public function phone_href( $phone ) {

        $find = '/\s| |\-|,/';
        $replace = '';
        return 'tel:+1' . preg_replace( $find, $replace, $phone );

    }

    public function output() {
        ?>
        <div class="participant">
            <img class="participant__img" src="<?php echo $this->img_src; ?>" srcset="<?php echo $this->img_srcset; ?>" alt="<?php echo $this->title; ?>" width="700" height="440" loading="lazy">
            <div class="participant__info">
                <h3 class="participant__title"><?php echo $this->title; ?></h3>   
                <p class="participant__shortdesc"><?php echo $this->short_desc; ?></p>                
                <div class="participant__longdesc"><?php echo $this->long_desc; ?></div>                                          
                <a href="<?php echo $this->address_href( $this->full_address ); ?>" class="participant__contact participant__contact--address" target="_blank" rel="noopener">
                    <?php echo $this->address . ', ' . $this->city; ?>
                </a>
                <?php if ( $this->phone !== '' ): ?>
                    <a href="<?php echo $this->phone_href( $this->phone ); ?>" class="participant__contact participant__contact--phone">
                        <?php echo $this->phone; ?>
                    </a>
                <?php endif; ?>
                <?php if ( $this->email !== '' ): ?>
                    <a href="mailto:<?php echo $this->email; ?>" class="participant__contact participant__contact--email">
                        <?php esc_html__e('Email'); ?>
                    </a> 
                <?php endif; ?>              
                <a href="<?php echo $this->ext_link; ?>" class="participant__cta" target="_blank" rel="noopener">En savoir plus</a>
            </div>
        </div>
        <?php      

    }

}