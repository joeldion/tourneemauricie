'use strict';

window.onload = function() {
    mediaUpload();
    updateParticipantCoordinates();
};

/*
 * WP Media upload for item attachments
 */
const mediaUpload = () => {

    const uploadBtns = document.querySelectorAll('.media-upload-btn');
    uploadBtns.forEach(btn => {

        const target = btn.dataset.target;
        const mediaImage = document.getElementById(target);
        const mediaPreview = document.getElementById(target + '-preview');
        const mediaRemoveBtn = document.getElementById(target + '-remove');
        let attachment = '';

        btn.addEventListener('click', function(e) {

            e.preventDefault();

            let mediaUploader;            
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }            
            
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: locals.select_file,
                button: {
                    text: locals.confirm,
                },
                multiple: false,
            });
            
            mediaUploader.on('select', function() {
                attachment = mediaUploader.state().get('selection').first().toJSON();              
                mediaImage.value = attachment.id;
                mediaPreview.style.backgroundImage = 'url(' + attachment.url + ')';
                mediaPreview.classList.add('visible');
                mediaRemoveBtn.classList.add('visible');
            });
            
            mediaUploader.open();

        });

        mediaRemoveBtn.addEventListener('click', function(e) {
            e.preventDefault();
            mediaImage.value = '';
            mediaPreview.style.backgroundImage = 'url()';
            mediaPreview.classList.remove('visible');
            mediaRemoveBtn.classList.remove('visible');
        });

    });

};

/*
 * Get Participant Coordinates
 */
const updateParticipantCoordinates = () => {

    if (!document.querySelector('.post-php.post-type-tma_participant')) return;

    const tmaAddress = document.querySelector('#tma-address');
    const tmaCity = document.querySelector('#tma-saved-city');
    const tmaPostalCode = document.querySelector('#tma-postal-code');
    const tmaAddressFields = document.querySelectorAll( '#tma-address, #tma-address-city, #tma-postal-code' );
    const tmaCoord = document.querySelector('#tma-coord');
    let geocoder = new google.maps.Geocoder();

    function getCoord() {

        const tmaFullAddress = tmaAddress.value + ', ' + tmaCity.value + ' ' + tmaPostalCode.value + ' QC Canada';
        const geocoderRequest = {
            'address': tmaFullAddress
        };
        geocoder.geocode(geocoderRequest, function(results) {
            // Update coordinates field witl lat/lng values
            const location = results[0].geometry.location;
            let coord = location.lat() + ',' + location.lng();
            tmaCoord.value = coord;            
        });

    }

    // Get coordinates from address if "Adjust coordinates" checkbox is checked
    if (!document.querySelector('#tma-coord-adjust').checked) {
        getCoord();
    }

    for (let i = 0; i < tmaAddressFields.length; i++) {
        tmaAddressFields[i].addEventListener('change', function(){
            getCoord();
        });
    }

};