<?php 
/* 
 * Class: Participant Contact Form
 */

class TMAParticipantContactForm {

    private $to_name;
    private $to_email;

    public function __construct( $to_name, $to_email ) {

        $content  = '<form method="post" action="" class="ca-contact" id="ca-contact">';

        $content .= '<label for="contact-name">Nom</label>';
        $content .= '<input type="text" name="contact_name" id="contact-name" placeholder="Votre nom" maxlength="50" required>';
        $content .= '<span class="error" id="name-error">Veuillez saisir votre nom.</span>';

        $content .= '<label for="contact-email">Courriel</label>';
        $content .= '<input type="email" name="contact_email" id="contact-email" placeholder="Votre adresse courriel" maxlength="50" required>';
        $content .= '<input type="email" name="contact_email_confirm" id="contact-email-confirm" placeholder="Confirmer l\'adresse courriel" maxlength="50" required>';
        $content .= '<span class="error" id="email-error">L\'adresse courriel n\'est pas identique.</span>';

        $content .= '<label for="contact-subject">' . esc_html__( 'Subject' ) .'</label>';
        $content .= '<input type="text" name="contact_subject" id="contact-subject" placeholder="Le sujet de votre message" maxlength="50" required>';
        $content .= '<span class="error" id="subject-error">Veuillez saisir un sujet.</span>';

        $content .= '<label for="contact-message">Message</label>';
        $content .= '<textarea name="contact_message" id="contact-message" placeholder="Votre message" maxlength="5000" required></textarea>';
        $content .= '<span class="error" id="message-error">Veuillez saisir un message.</span>';

        // $content .= '<br /><input type="submit" class="btn btn--catalog" name="submit" id="catalog-form-submit" value="Envoyer">';
        $content .= '<br /><a href="#" class="btn btn--catalog" id="catalog-form-submit">Envoyer</a>';
        $content .= '<input type="hidden" name="from_email" id="from-email" value="" required>';
        $content .= '<input type="hidden" name="to_name" id="to-name" value="' . $to_name . '">';
        $content .= '<input type="hidden" name="to_email" id="to-email" value="' . $to_email . '">';
        $content .= '<input type="hidden" name="recaptcha_token" id="recaptcha-token">';
        $content .= '<input type="hidden" name="form_sent" value="true">';
        $content .= '<span class="error" id="submit-error">Veuillez remplir tous les champs.</span>';

        $content .= '</form>';

        $this->content = $content;

    }

    public function output() {

        ob_start();
        echo $this->content;
        echo ob_get_clean();

    }

}