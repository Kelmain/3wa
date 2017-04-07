'use strict';



//declaration de la -classe-
var Vehicule = function (roues) {
    // -attribut- de la classe
    this.iNbRoues = roues;
    this.sColor = null;
    this.engine = new Engine();

};

Vehicule.prototype.getColor = function () {
    return this.sColor;
};


//methode
Vehicule.prototype.setColor = function (color) {
    this.sColor = color;

};


class Vehicule2 {
    constructor(roues, motor, color) {
        this.roues = roues;
        this.motor = motor;
        this.engines = new Engine2();

    }
    get attribut() {
        return this.roues = ' ' + this.motor;
    }
    setColor(color) {
        this.color = color;
    }

}
