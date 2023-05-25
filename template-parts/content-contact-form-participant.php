<?php 
/*
 * Participant Contact Form
 */
?>
<div class="tma-modal">

    <div class="tma-modal__content">
        <form method="post" action="" class="tma-form" id="tma-participant-form">
            
            <h5>Écrivez au participant</h5>

            <div class="tma-form__field">
                <label for="tma-form-name">Nom</label>
                <input type="text" name="tma-form_name" id="tma-form-name" placeholder="Votre nom" maxlength="50" required>
                <span class="tma-form__error" id="name-error">Veuillez saisir votre nom.</span>
            </div>
            
            <div class="tma-form__field">
                <label for="tma-form-email">Courriel</label>
                <input type="email" name="tma-form_email" id="tma-form-email" placeholder="Votre adresse courriel" maxlength="50" required>
                <input type="email" name="tma-form_email_confirm" id="tma-form-email-confirm" placeholder="Confirmer l\'adresse courriel" maxlength="50" required>
                <span class="tma-form__error" id="tma-form-email-error">L\'adresse courriel n\'est pas identique.</span>
            </div>
            
            <div class="tma-form__field">
                <label for="tma-form-subject">Sujet</label>
                <input type="text" name="tma-form_subject" id="tma-form-subject" placeholder="Le sujet de votre message" maxlength="50" required>
                <span class="tma-form__error" id="tma-form-subject-error">Veuillez saisir un sujet.</span>
            </div>
            
            <div class="tma-form__field">
                <label for="tma-form-message">Message</label>
                <textarea name="tma-form_message" id="tma-form-message" placeholder="Votre message" maxlength="5000" required></textarea>
                <span class="tma-form__error" id="tma-form-message-error">Veuillez saisir un message.</span>
            </div>

            <div class="tma-form__field"> 
                <a href="#" class="btn" id="tma-participant-form-submit">Envoyer</a>
            </div>

            <div class="tma-form__field">
                <span class="tma-form__error" id="submit-error">Veuillez remplir tous les champs.</span>
            </div>

            <input type="hidden" name="from_email" id="from-email" value="" required>
            <input type="hidden" name="to_name" id="to-name" value="">
            <input type="hidden" name="to_email" id="to-email" value="">
            <input type="hidden" name="recaptcha_token" id="recaptcha-token">
            <input type="hidden" name="form_sent" value="true">
            
        </form>

        <a href="#" class="tma-modal__close" id="tma-modal-close-btn"></a>
    </div>
</div>