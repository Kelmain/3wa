'use strict'; // Mode strict du JavaScript

/* global getMathRandom
/* global requestInteger
/* gloabal showImage
/*************************************************************************************************/
/* **************************************** DONNEES JEU **************************************** */
/*************************************************************************************************/

// L'unique variable globale est un objet contenant l'état du jeu.
var game;

const CUIVRE = 1;
const FER = 2;
const MAGICAL = 3;

const EASY = 1;
const NORMAL = 2;
const HARD = 3;

const PISSENLIT = 1;
const EPEE = 2;
const MJOLNIR = 3;

/*************************************************************************************************/
/* *************************************** FONCTIONS JEU *************************************** */
/*************************************************************************************************/



function initGame() {




    game = {};
    game.round = 1;


    // choix du niveau// définir les pdv
    game.niveau = requestInteger('Choisissez le niveau de difficulté : 1. Débutant - 2.intermédiaire - 3.expert', 1, 3);

    game.arme = requestInteger('Choisissez votre Arme : 1. Pissenlit - 2.Epée - 3.Mjölnir', 1, 3);

    game.armure = requestInteger('Choisissez votre Armure: 1. Cuivre - 2.Fer - 3.Magical', 1, 3);
    switch (game.niveau) {
    case EASY:
        // débutant
        game.pvDragon = getMathRandom(150, 170);
        game.pvJoueur = getMathRandom(230, 250);
        break;

    case NORMAL:
        game.pvDragon = getMathRandom(190, 210);
        game.pvJoueur = getMathRandom(190, 210);
        break;

    case HARD:
        game.pvDragon = getMathRandom(230, 250);
        game.pvJoueur = getMathRandom(150, 170);
        break;

    default:
        // je ne connais pas ce niveau

    }


    // choix des armes

    switch (game.arme) {
    case PISSENLIT:
        // pissenlit
        game.ratioWeapon = .5
        break;
        //epee
    case EPEE:
        game.ratioWeapon = 1
        break;
        //mjolnir
    case MJOLNIR:
        game.ratioWeapon = 2
        break;

    default:
        // je ne connais pas ce niveau

    }

    // choix de l'armure



    switch (game.armure) {
    case CUIVRE:

        game.ratioArmure = 1
        break;

    case FER:
        game.ratioArmure = 1.25
        break;

    case MAGICAL:
        game.ratioArmure = 2
        break;

    default:
        // je ne connais pas ce niveau

    }



}



function dragondps() {

    var damagePoint;

    switch (game.niveau) {
    case EASY:
        damagePoint = getMathRandom(5, 10);
        break;
    case NORMAL:
        damagePoint = getMathRandom(10, 20);
        break;
    case HARD:
        damagePoint = getMathRandom(20, 30);
        break;
    }







    return Math.round(damagePoint / game.ratioArmure);


}



function playerdps() {

    var damagePoint;

    switch (game.niveau) {
    case EASY:
        damagePoint = getMathRandom(25, 30);
        break;
    case NORMAL:
        damagePoint = getMathRandom(15, 20);
        break;
    case HARD:
        damagePoint = getMathRandom(5, 10);
        break;
    }
    return Math.round(damagePoint * game.ratioArmure);
}


function gameLoop() {
    var damagePoint;
    var dragonSpeed;
    var playerSpeed;


    while (game.pvDragon > 0 && game.pvJoueur > 0) {
        console.log('round ' + game.round);


        dragonSpeed = getMathRandom(10, 20);
        playerSpeed = getMathRandom(10, 20);


        if (dragonSpeed > playerSpeed) {

            damagePoint = dragondps();


            game.pvJoueur -= damagePoint;


            console.log(
                'Le dragon est plus fort et vous defonce ' +
                damagePoint + ' degats'
            );
        } else {

            damagePoint = playerdps();


            game.pvDragon -= damagePoint;


            console.log(
                'Vous ete plus fort et defonce le dragon ' +
                damagePoint + ' degats'
            );
        }

        showGameState();


        game.round++;
    }
}

function showGameState() {
    console.log(
        'Dragon : ' + game.pvDragon + ' PV, ' +
        'joueur : ' + game.pvJoueur + ' PV'
    );
}






function showGameWinner() {
    if (game.pvDragon <= 0) {
        showImage('images/knight.jpg');

        console.log("Tu roxx !");
        console.log("Il vous restait " + game.pvJoueur + " PV");
    } else // if(game.hpPlayer <= 0)
    {
        showImage('images/dragon.jpg');

        console.log("YOU SUXX");
        console.log("Il restait " + game.pvDragon + " PV au dragon");
    }
}


function startGame() {
    // Initialisation du jeu.
    // Initialisation du jeu.
    //console.clear();
    initGame();

    // Execution du jeu.
    console.log('Points de vie de depart :');
    showGameState();
    gameLoop();

    // Fin du jeu.
    showGameWinner();
}

/*************************************************************************************************/
/* ************************************** CODE PRINCIPAL *************************************** */
/*************************************************************************************************/

startGame();