jQuery(document).ready(function($){
    $('#upload_button').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload File',
            multiple: false
        }).open().on('select', function(e){
            var uploaded_image = image.state().get('selection').first();
            var image_url = uploaded_image.toJSON().url;
            $('#file_upload').val(image_url);

            // Update preview
            $('#file_upload_preview').attr('src', image_url);
        });
    });
});
