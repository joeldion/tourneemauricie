<?php 
/* 
 * Class: Participant Contact Form Success
 */

class TMAParticipantContactFormSuccess {

    private $product_id;

    public function __construct( $product_id ) {

        $this->product_id  = $product_id;
        $this->artist_id   = intval( get_post_meta( $this->product_id, '_product_artist_id', true ) );
        $this->artist_name = get_the_title( $this->artist_id );

    }

    public function show() {
        ?>
            <div class="success">
                <p>Votre message a été envoyé à «&nbsp;<?php echo $this->artist_name; ?>&nbsp;» avec succès.</p>
                <p>Merci de votre intérêt!</p>
                <a class="ca-product__return" href="<?php echo CATA_PAGE; ?>">❮&nbsp;&nbsp;Retour au catalogue</a>
            </div>
        <?php
    }

}