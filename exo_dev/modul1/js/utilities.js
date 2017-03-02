'use strict';
var rotate = 0;
/*Retourne un entier aléatoire entre le minimum et le maximum donné dans l'appel de la fonction */
/** min = int // max= int **/
function getRandomInteger(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
/* Regroupe la recherche de l'element du DOM ainsi que l'ajout de l'ecouteur d'evenement qui lui est destiné */
/** selector= id/class d'un element du DOM
    type = evenement à controler
   eventHandler = fonction à exectuer **/
function installEventHandler(selector, type, eventHandler) {
    var domObject;


    domObject = document.querySelector(selector);


    domObject.addEventListener(type, eventHandler);
}

function showImage(source) {
    document.write('<img src="' + source + '">');
}

function requestInteger(message, min, max) {
    var integer

    do {
        integer = parseInt(window.prompt(message));
    }

    while (isNaN(integer) || integer < 1 || integer > 3);

    return integer;



}




/* Rotation de l'element et de sa couleur sur le cercle chromatique en fonction du scroll (sens des aiguilles d'une montre pour un scroll vers le bas et sens inverse pour un scroll vers le haut)*/
/** event = evenement **/
function rotateSlider(event) {
    if (event.deltaY >= 0) {
        rotate += 10;
        this.style.transform = "rotate(" + rotate + "deg)";
        this.style.filter = "hue-rotate(" + rotate + "deg)";
    } else {
        rotate -= 10;
        this.style.transform = "rotate(" + rotate + "deg)";
        this.style.filter = "hue-rotate(" + rotate + "deg)";
    }
    console.log(event);
}