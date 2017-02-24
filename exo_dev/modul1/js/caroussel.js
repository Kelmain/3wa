'use strict';


const TESPACE = 32;
const TGAUCHE = 37;
const TDROITE = 39;
const THAUT = 38;
const TBAS = 40;

var rotate = 0;

var slides = [
    {
        image: 'images/1.jpg',
        legend: 'Street Art'
    },
    {
        image: 'images/2.jpg',
        legend: 'Fast Lane'
    },
    {
        image: 'images/3.jpg',
        legend: 'Colorful Building'
    },
    {
        image: 'images/4.jpg',
        legend: 'Skyscrapers'
    },
    {
        image: 'images/5.jpg',
        legend: 'City by night'
    },
    {
        image: 'images/6.jpg',
        legend: 'Tour Eiffel la nuit'
    }
];


var state;

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


function onSliderGoToNext() {

    state.index++;


    if (state.index == slides.length) {

        state.index = 0;
    }


    refreshSlider();
}

function onSliderGoToPrevious() {

    state.index--;


    if (state.index < 0) {

        state.index = slides.length - 1;
    }


    refreshSlider();
}

function onSliderGoToRandom() {
    var index;

    do {

        index = getRandomInteger(0, slides.length - 1);
    }
    while (index == state.index);


    state.index = index;


    refreshSlider();
}


function onSliderKeyUp(event) {


    switch (event.keyCode) {
    case TDROITE:

        onSliderGoToNext();
        break;

    case TESPACE:

        onSliderToggle();
        break;

    case TGAUCHE:

        onSliderGoToPrevious();
        break;
    case TBAS:

        onSliderGoToPrevious();
        break;
    case THaut:

        onSliderGoToNext();
        break;
    }
}

function onSliderToggle() {
    var icon;


    icon = document.querySelector('#slider-toggle i');

    icon.classList.toggle('fa-play');
    icon.classList.toggle('fa-pause');


    if (state.timer == null) {

        state.timer = window.setInterval(onSliderGoToNext, 2000);

        this.title = 'ArrÃªter le carrousel';
    } else {

        window.clearInterval(state.timer);


        state.timer = null;


        this.title = 'Demarrer le carrousel';
    }
}

function onToolbarToggle() {
    var icon;


    icon = document.querySelector('#toolbar-toggle i');

    icon.classList.toggle('fa-arrow-down');
    icon.classList.toggle('fa-arrow-right');


    document.querySelector('.toolbar ul').classList.toggle('hide');
}

function refreshSlider() {
    var sliderImage;
    var sliderLegend;


    sliderImage = document.querySelector('#slider img');
    sliderLegend = document.querySelector('#slider figcaption');


    sliderImage.src = slides[state.index].image;
    sliderLegend.textContent = slides[state.index].legend;
}




document.addEventListener('DOMContentLoaded', function () {

    state = {};
    state.index = 0;
    state.timer = null;



    installEventHandler('#slider-random', 'click', onSliderGoToRandom);
    installEventHandler('#slider-previous', 'click', onSliderGoToPrevious);
    installEventHandler('#slider-next', 'click', onSliderGoToNext);
    installEventHandler('#slider-toggle', 'click', onSliderToggle);
    installEventHandler('#toolbar-toggle', 'click', onToolbarToggle);


    document.addEventListener('keyup', onSliderKeyUp);

    refreshSlider();
});









/*function rotateSlider(event) {
    if (event.deltaY >= 0) {
        this.style.transform += "rotate(10deg)";
    } else {
        this.style.transform += "rotate(-10deg)";
    }
    console.log(event);
}

*/
function eventListener(selecteur, type, action) {
    var objetDom;
    objetDom = document.querySelector(selecteur);
    objetDom.addEventListener(type, action);
}


eventListener('#slider', 'wheel', rotateSlider);