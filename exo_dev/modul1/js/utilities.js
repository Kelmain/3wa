'use strict';

function getRandomInteger(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function installEventHandler(selector, type, eventHandler) {
    var domObject;


    domObject = document.querySelector(selector);


    domObject.addEventListener(type, eventHandler);
}