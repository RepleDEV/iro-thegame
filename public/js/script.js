const MENUS = ["loading","main", "newgame", "play", "login", "signup", "settings", "stats", "profile", "profile_settings", "game_settings", "win"];
var current_menu = 0;

var chosenDifficulty;

var hasCreatedNewGame = false;

var menu_cooldown = false;

$(document).ready(async function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        }
    });
    $("#loading_message").html("Getting userprofile");
    await getUserProfile();
    $("#loading_message").html("Getting leaderboard data");
    await getLeaderboard();
    Menu.setTo("main");
    if (hasLoggedIn)toggleLogin();
    if (leaderboardData)serveLeaderboard();
});

function toggleLogin() {
    $("#login_menubtn").toggle();
    $("#stats_menubtn").toggle();
    $("#profile_menubtn").toggle();
    $("#profilesettings_menubtn").toggle();
    $("#logged_in_as").html((hasLoggedIn ? userProfile.username : ""));
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

function Menucooldown() {
    menu_cooldown = true;
    setTimeout(() => {
        menu_cooldown = false;
    }, 500);
}

// Menu functions
const Menu = {
    previous: () => {
        if (menu_cooldown)return;
        $(`.${MENUS[current_menu]}-menu`).fadeOut(415);
        current_menu--;
        setTimeout(() => {
            $(`.${MENUS[current_menu]}-menu`).fadeIn();
        }, 415);
        Menucooldown();
    },
    next: () => {
        if (menu_cooldown)return;
        $(`.${MENUS[current_menu]}-menu`).fadeOut(415);
        current_menu++;
        setTimeout(() => {
            $(`.${MENUS[current_menu]}-menu`).fadeIn();
        }, 415);
        Menucooldown();
    },
    setTo: (menu_name) => {
        if (menu_cooldown)return;
        $(`.${MENUS[current_menu]}-menu`).fadeOut(415);
        current_menu = MENUS.indexOf(menu_name);
        setTimeout(() => {
            $(`.${menu_name}-menu`).fadeIn();
        }, 415);
        Menucooldown();
    },
    hide: (menu_name) => {
        if (menu_cooldown)return;
        $(menu_name).fadeOut(415);
        Menucooldown();
    },
    show: (menu_name) => {
        if (menu_cooldown)return;
        $(menu_name).fadeIn();
        Menucooldown();
    },
    current: () => console.log("Curent Menu: " + MENUS[current_menu])
};
