'use strict';






// creation d'une -instance- de -l'objet-
var voiture = new Vehicule(4);
voiture.setColor('rouge');
voiture.engine.setCylindre(5);
voiture.engine.setEnergy('gazoil');

console.log(voiture);




var moto = new Vehicule(2);
moto.setColor('bleu');
voiture.engine.setCylindre(3);
voiture.engine.setEnergy('fuel');
console.log(moto);






var voiture2 = new Vehicule2(4, "100ps", "red");

voiture2.color = ('red');

voiture2.engines.iCylender = (8);
voiture2.engines.sEnergie = ('gazoil');

var moto2 = new Vehicule2(2, "150ps", "bleu");
moto2.color = ('blue');

moto2.engines.iCylender = (6);
moto2.engines.sEnergie = ('fuel');



console.log(voiture2);
console.log(moto2);
