'use strict';

function getMathRandom(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function requestInteger(message, min, max) {
    var integer

    do {
        integer = parseInt(window.prompt(message));
    }

    while (isNaN(integer) || integer < 1 || integer > 3);

    return integer;



}



function showImage(source) {
    document.write('<img src="' + source + '">');
}

function installEventHandler(selector, type, eventHandler) {
    var domObject;


    domObject = document.querySelector(selector);


    domObject.addEventListener(type, eventHandler);
}




function rotateSlider(event) {
    var rotate;
    if (event.deltaY >= 0) {
        rotate += 10;
        this.style.transform = "rotate(" + rotate + "deg)";
    } else {
        rotate -= 10;
        this.style.transform += "rotate(" + rotate + "deg)";
    }
    console.log(event);
}


function eventListener(selecteur, type, action) {
    var objetDom;
    objetDom = document.querySelector(selecteur);
    objetDom.addEventListener(type, action);
}