"use strict";

var step;
var hasStartedPlaying = false;
var hasWon = false;

var finalcolor;

var stopwatch_seconds = 0;
var loop_second;

var colorPicker = new iro.ColorPicker('#picker_element', {
    layout: [
        {component:iro.ui.Box,},
        {component:iro.ui.Slider,},
        {component:iro.ui.Slider,options:{sliderType:'hue'}}
    ],
    width:220,
    color:"#000",
    layoutDirection: "horizontal",
});

const generateRandomColor = () => [Math.floor(Math.random() * 256),Math.floor(Math.random() * 256),Math.floor(Math.random() * 256)];

// Does not accept decimals in any of its parameters
function round(num) {
    var nearestMultiple = num;
    while (nearestMultiple % step != 0) {
        nearestMultiple--;
    }
    if (num - nearestMultiple < step / 2) {
        return nearestMultiple;
    } else {
        return nearestMultiple + step;
    }
}

function objectToArr(obj) {
    return Object.keys(obj).map((key) => [obj[key]]).map(val => val[0]);
}

String.prototype.toHHMMSS = function () {
    var sec_num = parseInt(this, 10); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes+':'+seconds;
}

const Game = {
    new: () => {
        step = 256 / 2**step - 1;
        $("#slider_r").attr("step", step);
        $("#slider_g").attr("step", step);
        $("#slider_b").attr("step", step);

        var rgc = generateRandomColor().map(round)
        $("#color_g").css("background-color", `rgb(${rgc[0]},${rgc[1]},${rgc[2]})`);

        hasCreatedNewGame = true;

        $("#game_diff").html(Difficulty.current());

        return;
    },
    updateColors: () => {
        var colors = Game.getCurrentColors();
        $("#color_u").css("background-color", `rgb(${colors[0][0]},${colors[0][1]},${colors[0][2]})`);
        $("#game_colors").html(colors[1].join(", "));



        Game.checkWin();
        return;
    },
    updateColorPicker: () => {
        var colorPickerColors = Game.getCurrentColors()[0];
        colorPicker.color.rgb = {r: colorPickerColors[0], g:colorPickerColors[1],b:colorPickerColors[2]};
        return;
    },
    updateSliders: val => {
        $("#slider_r").val(val[0]);
        $("#slider_g").val(val[1]);
        $("#slider_b").val(val[2]);
    },
    checkWin: () => {
        if ($("#color_g").css("background-color") == colorPicker.color.rgbString) {
            hasWon = true;
            Game.stop();
        }
    },
    stop: () => {
        Stopwatch.stop();

        finalcolor = Game.getCurrentColors();
        Game.lock();
    },
    lock: () => {
        $("#slider_b").prop("disabled", true);
        $("#slider_r").prop("disabled", true);
        $("#slider_g").prop("disabled", true);
    },
    getCurrentColors: () => {
        var sliderColors = [
            $("#slider_r").val(),
            $("#slider_g").val(),
            $("#slider_b").val(),
        ];
        var pickerColors = objectToArr(colorPicker.color.rgb);
        return [sliderColors, pickerColors];
    }
    
};

function sliderFunc() {
    Game.updateColorPicker();
    Game.updateColors();
    Stopwatch.start()
}

function second() {
    stopwatch_seconds++;

    $("#game_time").html(stopwatch_seconds.toString().toHHMMSS());

    loop_second = setTimeout(second, 1000);
}

const Stopwatch = {
    start: () => {
        if (hasStartedPlaying) {
            return;
        } else {
            hasStartedPlaying = true;
        }
        second();
    },
    time: () => stopwatch_seconds,
    stop: () => {
        clearTimeout(loop_second);
    }
};

colorPicker.on("color:change", val => {
    if (hasWon) {
        colorPicker.color.rgb = {r:finalcolor[0][0],g:finalcolor[0][1],b:finalcolor[0][2]};
    }
    Stopwatch.start();
    Game.updateSliders(objectToArr(val.rgb));
    Game.updateColorPicker();
    Game.updateColors();
});
