'use strict';
var button2;
var rectangle;

button2 = document.getElementById('toogle');
rectangle = document.querySelector('.rectangle');


function buttonHide() {

    var button = document.createElement('button');
    button.setAttribute('id', 'toogle-rectangle');

    var buttonText = document.createTextNode('Cacher/afficher le rectangle');
    button.appendChild(buttonText);

    button.addEventListener('click', hide, false);

    var buttonPost = document.querySelector('.test');
    if (!buttonPost) return;
    buttonPost.appendChild(button);
}

buttonHide();

/*if (button2.classList.contains('hide')) {
    button2.classList.remove('hide');
} else {
    button2.classList.add('hide');
}*/


function hide() {
    rectangle.classList.toggle('hide');

}

function mousover() {
    if (rectangle.classList.contains('important')) {
        rectangle.classList.remove('important');

    } else {
        rectangle.classList.add('important');

    }
}


function mousout() {
    rectangle.classList.remove('important');
    rectangle.classList.remove('good');
}

function doublemsclick() {
    if (rectangle.classList.contains('good')) {
        rectangle.classList.remove('good');

    } else {
        rectangle.classList.add('good');

    }
}


//button.addEventListener('click', hide, false);
rectangle.addEventListener('mouseout', mousout, false);
rectangle.addEventListener('mouseover', mousover, false);
rectangle.addEventListener('dblclick', doublemsclick, false);