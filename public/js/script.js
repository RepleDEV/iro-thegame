const MENUS = ["loading","main", "newgame", "play", "login", "signup", "settings", "stats", "profile", "profile_settings", "game_settings"];
var current_menu = 0;

var chosenDifficulty;

var hasCreatedNewGame = false;

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        }
    });
    $("#loading_message").html("Getting userprofile");
    $.ajax({
        type: "POST",
        url: "/ajax_handler/get/profile",
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
});

function setupLogIn() {
    var child_menu_element = $(".main-menu").children();
    var children_amount = child_menu_element.length;
    var child_element = child_menu_element.first();
    for (var i = 0;i < children_amount;i++) {
        if (child_element.children().first().html().trim() == "log-in") {
            child_element.addClass("hidden");
            child_element = child_element.next();
            continue;
        }
        if (child_element.hasClass("hidden")) {
            child_element.removeClass("hidden");
        }
        child_element = child_element.next();
    }
    $("#logged_in_as").html(userProfile.username);
    $(".status-corner").html($(".status-corner").html() + ` | Logged in as: <strong>${userProfile.username}</strong>`);
}

// Onstart header animation
$(".header-hr").fadeIn(1150);
$(".header-hr").css("width", "100%");

// Navbar toggle
$(".navbar").mouseenter(function () { 
    toggleNav();
});
$(".navbar").mouseleave(function () { 
    toggleNav();
});

// Play btn from the main menu
$("#btn-play").click(function (e) { 
    e.preventDefault();
    if (MENUS[current_menu] != "newgame") {
        Menu.setTo('newgame');
    }
});

// Difficulty
const Difficulty = {
    easy: () => {
        if (!hasCreatedNewGame){
            chosenDifficulty = "easy";
            step = 4;
            Menu.next();
            Game.new();
        }
    },
    medium: () => {
        if (!hasCreatedNewGame) {
            chosenDifficulty = "medium";
            step = 6;
            Menu.next();
            Game.new();
        }
    },
    hard: () => {
        if (!hasCreatedNewGame) {
            chosenDifficulty = "hard";
            step = 8;
            Menu.next();
            Game.new();
        }
    },
    current: () => chosenDifficulty
}

// Leaderboard button toggle
$(".leaderboard_diff_btn").click(function (e) { 
    e.preventDefault();
    switch (this.innerHTML) {
        case "4-bit":
            this.innerHTML = "6-bit";
            $(".leaderboard_diff_btn").removeClass("btn-g");
            $(".leaderboard_diff_btn").addClass("btn-y");
            break;
        case "6-bit":
            this.innerHTML = "8-bit";
            $(".leaderboard_diff_btn").removeClass("btn-y");
            $(".leaderboard_diff_btn").addClass("btn-r");
            break;
        case "8-bit":
            this.innerHTML = "4-bit";
            $(".leaderboard_diff_btn").removeClass("btn-r");
            $(".leaderboard_diff_btn").addClass("btn-g");
            break;
    }
});

// Navbar toggle
function toggleNav() {
    if($(".link-text").is(":hidden")){
        $(".navbar").css("width", "16rem");
        setTimeout(() => {
            $(".link-text").fadeToggle(150);
        }, 120);
    } else {
        $(".navbar").css("width", "5rem");
        $(".link-text").fadeToggle(70);
    }
}

// Menu functions
const Menu = {
    previous: () => {
        $(`.${MENUS[current_menu]}-menu`).fadeOut(415);
        current_menu--;
        setTimeout(() => {
            $(`.${MENUS[current_menu]}-menu`).fadeIn();
        }, 415);
    },
    next: () => {
        $(`.${MENUS[current_menu]}-menu`).fadeOut(415);
        current_menu++;
        setTimeout(() => {
            $(`.${MENUS[current_menu]}-menu`).fadeIn();
        }, 415);
    },
    setTo: (menu_name) => {
        $(`.${MENUS[current_menu]}-menu`).fadeOut(415);
        current_menu = MENUS.indexOf(menu_name);
        setTimeout(() => {
            $(`.${menu_name}-menu`).fadeIn();
        }, 415);
    },
    hide: (menu_name) => {
        $(menu_name).fadeOut(415);
    },
    show: (menu_name) => {
        $(menu_name).fadeIn();
    },
    current: () => console.log("Curent Menu: " + MENUS[current_menu])
};
