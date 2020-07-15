"use strict";

var step;

var colorPicker = new iro.ColorPicker('#picker_element', {
    layout: [
        {component:iro.ui.Box,},
        {component:iro.ui.Slider,}
    ],
    width:220,
    color:"#000",
    wheelLightness:false,
    layoutDirection: "horizontal",
});

const generateRandomColor = () => [Math.floor(Math.random() * 256),Math.floor(Math.random() * 256),Math.floor(Math.random() * 256)];

const Game = {
    new: () => {
        var rgc = generateRandomColor();
        $("#color_g").css("background-color", `rgb(${rgc[0]},${rgc[1]},${rgc[2]})`);
        

        step = 256 / 2**step - 1;
        $("#slider_r").attr("step", step);
        $("#slider_g").attr("step", step);
        $("#slider_b").attr("step", step);

        hasCreatedNewGame = true;
    },
    updateColors: () => {
        var colors = Game.getCurrentColors();
        $("#color_u").css("background-color", `rgb(${colors[0]},${colors[1]},${colors[2]})`);
    },
    getCurrentColors: () => 
        [
            $("#slider_r").val(),
            $("#slider_g").val(),
            $("#slider_b").val(),
        ],
    
};
