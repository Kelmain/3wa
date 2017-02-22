'use strict';


var products = ['tomate', 'salade', 'oignon', 'pomme'];
//var item;
//var itemdel;


//item = document.getElementById("item").value;
//delet = document.getElementById("delet").value;



function ajouteProd(item) {

    products.push(item);
    return 'vous avez ajoute' + item;
}





function suppProd(itemdel) {
    var index;
    index = products.indexOf(itemdel);
    if (index == -1) {
        console.log("erreur! " + itemdel + " n'existe pas");
        return;
    } else {
        products.splice(index, 1)
    }
}

function suppAll() {

    products = [];
}

function showAll() {
    var index;
    console.clear();

    console.log('votre liste des courses contient ' + products.length + ' item(s)');
    for (index = 0; index < products.length; index++) {
        console.log(products[index]);

    }

}