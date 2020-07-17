"use strict";

var step;

var colorPicker = new iro.ColorPicker('#picker_element', {
    layout: [
        {component:iro.ui.Box,},
        {component:iro.ui.Slider,},
        {component:iro.ui.Slider,options:{sliderType:'hue'}}
    ],
    width:220,
    color:"#FFF",
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

const Game = {
    new: () => {
        var rgc = generateRandomColor();
        $("#color_g").css("background-color", `rgb(${rgc[0]},${rgc[1]},${rgc[2]})`);
        

        step = 256 / 2**step - 1;
        $("#slider_r").attr("step", step);
        $("#slider_g").attr("step", step);
        $("#slider_b").attr("step", step);

        hasCreatedNewGame = true;
        return;
    },
    updateColors: () => {
        var colors = Game.getCurrentColors()[0];
        $("#color_u").css("background-color", `rgb(${colors[0]},${colors[1]},${colors[2]})`);
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

colorPicker.on("color:change", val => {
    Game.updateSliders(Game.getCurrentColors()[1]);
    Game.updateColorPicker();
    Game.updateColors();
});
