<?php 
/*
 * Class: Participant
 */

class TMAParticipant {

    private $id;
    private $index;

    public function __construct( $id, $index ) {

        $this->id = $id;
        $this->index = $index;
        $this->img_id = get_post_thumbnail_id( $this->id );
        if ( empty( $this->img_id ) ) $this->img_id = get_option( 'tma_participants_default_image' );
        $this->img_src = wp_get_attachment_image_url( $this->img_id, 'tma' );
        $this->img_srcset = tma_srcset( $this->img_id );
        $this->image_loading = $index <= 1 ? 'eager' : 'lazy'; // Don't lazy the first 2 images
        $this->title = get_the_title( $this->id );
        $this->short_desc = esc_html( get_post_meta( $this->id, '_tma_short_desc', true ) );
        $this->long_desc = wpautop( get_post_meta( $this->id, '_tma_long_desc', true ) );
        $this->region = esc_html( get_post_meta( $this->id, '_tma_region', true ) );
        $this->address = esc_html( get_post_meta( $this->id, '_tma_address', true ) );        
        // $this->city = esc_html( get_post_meta( $this->id, '_tma_city', true ) );
        $this->city = get_the_terms( $post_id, 'tma_participant_city' )[0]->name;
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

    public function output() {
        ?>
        <div class="participant">
            <img class="participant__image" src="<?php echo $this->img_src; ?>" srcset="<?php echo $this->img_srcset; ?>" alt="<?php echo $this->title; ?>" width="600" height="400" loading="<?php echo $this->image_loading; ?>">
            <div class="participant__details">

                <h3 class="participant__title"><?php echo $this->title; ?></h3>

                <?php if ( !empty( $this->short_desc ) ): ?>
                    <p class="participant__short-desc">
                        <?php echo $this->short_desc; ?>
                    </p>
                <?php endif; ?>  

                <?php if ( !empty( $this->long_desc ) ): ?>
                    <div class="participant__long-desc">
                        <?php echo $this->long_desc; ?>
                    </div>
                <?php endif; ?>

                <?php if ( !empty( $this->address ) ): ?>
                    <a class="participant__contact participant__contact--address" href="<?php echo $this->address_href( $this->full_address ); ?>" target="_blank" rel="noopener">
                        <?php echo $this->address . ', ' . $this->city; ?>
                    </a>
                <?php endif; ?> 

                <?php if ( !empty( $this->phone ) ): ?>
                    <a class="participant__contact participant__contact--phone" href="<?php tma_format_phone( $this->phone, 'href' ); ?>">
                        <?php tma_format_phone( $this->phone ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( !empty( $this->email ) ): ?>
                    <a class="participant__contact participant__contact--email" href="mailto:<?php echo $this->email; ?>" id="participant-email" data-post-id="<?php echo $this->id; ?>">
                        <?php esc_html_e( 'Email' ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( !empty( $this->website ) ): ?>
                    <a href="<?php echo $this->website; ?>" class="participant__cta tma-btn" target="_blank" rel="noopener">
                        <?php esc_html_e( 'More info', TMA_DOMAIN ); ?>
                    </a>
                <?php endif; ?>

            </div>
        </div>
        <?php

    }

}