$(document).ready(function () {
    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Email không được để trống.",
                email: "Email không đúng định dạng."
            },
            password: {
                required: "Mật khẩu không được để trống."
            }
        },
        submitHandler: function(form) {
            $(".alert-success").show();
        }
    });
    $("#forget-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            email: {
                required: "Email không được để trống.",
                email: "Email không đúng định dạng."
            },
        },
        submitHandler: function(form) {
            $(".processing-message").show();
            setTimeout(function() {
                $(".processing-message").hide();
                $(".success-message").show();
            }, 2000);
        }
    });
    if ($(".forgot-pos-password").length) {
        $('.forgot-pos-password').click(function () {
            $('.login-form-view').hide();
            $('.forgot-pass-view').show();
        });
    }
    if ($("#back-btn").length) {
        $('#back-btn').click(function () {
            $('.login-form-view').show();
            $('.forgot-pass-view').hide();
        });
    }
});