$(document).ready(function() {

    // Enable Tooltips
    $('[rel="tooltip"]').tooltip();


    // Enable form validation
    $('.submit-image-form').validate({
        errorClass: 'error-text text-danger',
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });

    // Add validation rule
    $('.image-title-input').rules('add', {
        required:  true,
        maxlength: 100
    });

    // Add validation rule
    $('.image-file-upload-input').rules('add', {
        required:  true
    });

    // Add validation rule
    $('.image-comment-input').rules('add', {
        maxlength: 250
    });


    $('.image-file-upload-input:file').change(function(event) {

        // Initialize formData object
        var fileName = $(this).val().split('\\').pop();

        $.post('/images/hash', { fileName: fileName }, function(data) {

            // Parse JSON data
            var obj = $.parseJSON(data);

            if (obj.file_hash) {

                // Set the file hash input value
                $('.image-file-hash-input').val(obj.file_hash);

            }

        });

    });

});
