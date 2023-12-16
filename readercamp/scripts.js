jQuery(document).ready(function($) {
    $(document).on('click', '.upload_image_button', function(e) {
        e.preventDefault();

        var button = $(this);
        var imageField = $(this).prev('input[type="text"]');
        
        // Create a media frame
        var mediaUploader = wp.media({
            title: 'Upload Image',
            library: {
                type: 'image' // Restricting media library to images
            },
            button: {
                text: 'Select'
            },
            multiple: false // Allow only one image to be selected
        });

        // When an image is selected, run a callback
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            imageField.val(attachment.url);
            button.siblings('img').attr('src', attachment.url);
        });

        // Open the uploader dialog
        mediaUploader.open();
    });

    $(document).on('click', '.remove_image_button', function(e) {
        e.preventDefault();
        
        var button = $(this);
        imageField = $(this).prev('input[type="text"]');
        
        // Clear the value of the image field
        imageField.val('');
        button.siblings('img').attr('src', '');
        button.siblings('input[type="text"]').attr('value', '');
    });
    
});
