'use strict';

function getRandomInteger(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function installEventHandler(selector, type, eventHandler) {
    var domObject;


    domObject = document.querySelector(selector);


    domObject.addEventListener(type, eventHandler);
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