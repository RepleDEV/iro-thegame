$(document).ready(function () {
    $(".navbar").mouseenter(function () { 
        toggleNav();
    });
    $(".navbar").mouseleave(function () { 
        toggleNav();
    })
});

$("#btn-play").click(function (e) { 
    e.preventDefault();
    $(".main-menu").fadeOut(415);
    setTimeout(() => {
        $(".newgame-menu").fadeIn();
    }, 415);
});

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
