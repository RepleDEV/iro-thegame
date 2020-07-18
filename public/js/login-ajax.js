"use strict";

var userProfile;

function login() {
    var username = $("#username_login").val();
    var email = $("#email_login").val();
    var passwd = $("#passwd_login").val();

    if (!username) {
        $("#login_error_message").html("insert username");
        return;
    }
    if (username.length < 4) {
        $("#login_error_message").html("username must atleast be 4 characters long");
        return;
    }

    if (!email) {
        $("#login_error_message").html("insert email address");
        return;
    }
    if (!ValidateEmail(email)) {
        $("#login_error_message").html("insert proper email address");
        return;
    }

    if (!passwd) {
        $("#login_error_message").html("insert password");
        return;
    }
    if (passwd.length < 8) {
        $("#login_error_message").html("password must atleast be 8 characters long");
        return;
    }

    $.ajax({
        type: "POST",
        url: "/login",
        data: {
            "username":username,
            "email":email,
            "password":passwd
        },
        success: function (response) {
            if (response.err) {
                $("#login_error_message").html(response.err);
                return;
            }
            Menu.setTo("main");
            getUserProfile();
        }
    });
}

function signup() {
    var username = $("#username_signup").val();
    var email = $("#email_signup").val();
    var passwd = $("#passwd_signup").val();

    if (!username) {
        $("#signup_error_message").html("insert username");
        return;
    }
    if (username.length < 4) {
        $("#signup_error_message").html("username must atleast be 4 characters long");
        return;
    }

    if (!email) {
        $("#signup_error_message").html("insert email address");
        return;
    }
    if (!ValidateEmail(email)) {
        $("#signup_error_message").html("insert proper email address");
        return;
    }

    if (!passwd) {
        $("#signup_error_message").html("insert password");
        return;
    }
    if (passwd.length < 8) {
        $("#signup_error_message").html("password must atleast be 8 characters long");
        return;
    }

    $.ajax({
        type: "POST",
        url: "/register",
        data: {
            "name":username,
            "email":email,
            "password":passwd,
            "password_confirmation":passwd
        },
        success: function (response) {
            console.log(response);
            if (response.err) {
                $("#signup_error_message").html(response.err);
                return;
            }
            Menu.setTo("main");
            getUserProfile();
        }
    });
}

function resetToken() {

}

function getUserProfile() {
    $("#loading_message").html("Getting userprofile");
    $.ajax({
        type: "POST",
        url: "/ajax_handler/get/profile",
        // data:{"_token": "{{ csrf_token() }}"},
        error: function (xhr,status,error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.message);
        },
        success: function (response) {
            if (response.err) {
                switch (response.err) {
                    case "NOT LOGGED IN":
                        Menu.setTo("main");
                        break;
                }
                return;
            }
            Menu.setTo("main");
            userProfile = response;
            setupLogIn();
        }
    });
}

function logout() {
    $.ajax({
        type: "POST",
        url: "/ajax_handler/logout",
        success: function (response) {
            Menu.setTo("main");
        }
    });
}

function ValidateEmail(email) {return email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) ? true : false;}
