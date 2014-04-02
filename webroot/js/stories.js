$(document).ready(function() {

    $('.story-file-upload-input:file').change(function(event) {

        // Initialize formData object
        var fileName = $(this).val();

        $.post('/stories/hash', { fileName: fileName }, function(data) {

            // Parse JSON data
            var obj = $.parseJSON(data);

            if (obj.file_hash) {

                // Set the file hash input value
                $('.story-file-hash-input').val(obj.file_hash);

            }

        });

    });

});
