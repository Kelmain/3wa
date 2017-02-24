'use strict';

var photos;
var total;
var index;

//fonctions

function selectedPhotos() {
    var clickPhotos;
    this.classList.toggle('selected');

    clickPhotos = document.querySelectorAll('.photo-list li.selected');

    total.textContent = clickPhotos.length;

}






//code principal





photos = document.querySelectorAll('.photo-list li');
total = document.querySelector('#total em');


for (index = 0; index < photos.length; index++) {
    photos[index].addEventListener('click', selectedPhotos);
}