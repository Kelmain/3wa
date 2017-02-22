'use strict';

var first;
var second;
var result;
var operation;

operation = 0;
while (isNaN(first) && isNaN(second)) {
    first = parseFloat(window.prompt("votre premier chiffre?", 0));
    second = parseFloat(window.prompt("votre deuxieme chiffre?", 0))
}
while (!isNaN(operation)) {
    operation = window.prompt("quelle operation vous voulez effectue?", 0);
}


switch (operation.toLocaleLowerCase().trim()) {
case "-":
case "soustraction":
    result = first - second;
    break;
case "+":
case "addition":
    result = first + second;
    break;
case "/":
case "division":
    result = first / second;
    break;
case "*":
case "multiplication":
    result = first * second;
    break;
    if (second != 0) {
        result = first / second;
        break;

    } else {

        result = 0;
        window.alert("on utilise pas de 0!!");
    }


default:

    operation = "utilise une operation";
    first = 0;
    second = 0;
    result = 0;
    break;
}



document.write("<p>resultat : " + result + "</p>");