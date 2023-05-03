'use strict';

window.onload = function() {
    mediaUpload();
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