jQuery(document).ready(function () {
    jQuery('#submit').on('click', function (event) {
        event.preventDefault(); // Prevent the default form submission
        
        // Validate captcha
        if (jQuery('#captcha_val').val() !== jQuery('#captcha_text').val()) {
            jQuery('#captcha_text').parent('div').append('<span class="error">Captcha does not match</span>');
        } else {
            // If captcha matches, validate the form using jQuery validation plugin
            jQuery("#contactpage").validate({
                submitHandler: function (form) {
                    submitSignupFormNow(jQuery(form));
                },
                rules: {
                    fname: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
                errorElement: "span",
                errorPlacement: function (error, element) {
                    error.appendTo(element.parent());
                }
            });
        }
    });

    // Define the submitSignupFormNow function outside the event handler
    function submitSignupFormNow(form) {
        var formData = form.serialize();
        var url = "contact-form.php";
        jQuery.ajax({
            url: url,
            type: "POST",
            data: formData,
            success: function (response) {
                var responseData = jQuery.parseJSON(response);
                if (responseData.status === "Success") {
                    jQuery("#form_result").html('<span class="form-success alert alert-success d-block">' + responseData.msg + "</span>");
                } else {
                    jQuery("#form_result").html('<span class="form-error alert alert-danger d-block">' + responseData.msg + "</span>");
                }
                jQuery("#form_result").show();
            }
        });
    }
});
