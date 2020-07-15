function login() {
    var username = $("#username").val();
    var email = $("#email").val();
    var passwd = $("#passwd").val();

    if (!username) {
        $("#error_message").html("insert username");
        return;
    }
    if (username.length < 4) {
        $("#error_message").html("username must atleast be 4 characters long");
        return;
    }

    if (!email) {
        $("#error_message").html("insert email address");
        return;
    }
    if (!ValidateEmail) {
        $("#error_message").html("insert proper email address");
        return;
    }

    if (!passwd) {
        $("#error_message").html("insert password");
        return;
    }
    if (passwd.length < 8) {
        $("#error_message").html("password must atleast be 8 characters long");
        return;
    }

    $.ajax({
        type: "POST",
        url: "/login",
        data: {
            "_token":"<?php echo csrf_token() ?>",
            "username":username,
            "email":email,
            "password":passwd
        },
        success: function (response) {
            
        }
    });
}

function ValidateEmail(email) {return email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) ? true : false;}
