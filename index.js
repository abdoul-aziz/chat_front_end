$(document).ready(function() {
    $('#add').ready(function() {
        $('#add form').ajaxForm({
            resetForm: true,
            beforeSubmit: function(formData, jqForm, options) {
                console.log('here');
            },
            success: function(data) {
                if (data >= 1) {
                    $.post("provider.php", function(data) {
                        //$('#result').html(data);
                        console.log('success');
                    });
                }
            }
        });
    });
});