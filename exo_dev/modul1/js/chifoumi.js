var myChoice = prompt("choisi entre papier , pierre, ciseaux, spock , lizard").toLowerCase().trim();

var chifoumi = function(myChoice) {

  
    myChoice = this.myChoice;

    var opponentChoice;
    var win = "You win.";
    var lose = "You lose.";


    var randomnumber = Math.floor(Math.random()*5);

    if (randomnumber === 0) opponentChoice = "ciseaux";
    if (randomnumber === 1) opponentChoice = "pierre";
    if (randomnumber === 2) opponentChoice = "papier";
        if (randomnumber === 3) opponentChoice = "spock";
        if (randomnumber === 4) opponentChoice = "lizard";

   
    document.write("ton choix: " + myChoice + ". oppenent choix: " + opponentChoice       + "." )


    if (myChoice == opponentChoice) document.write("egalite.");


    else if ((myChoice == "ciseaux" && opponentChoice == "papier")||
    (myChoice == "papier" && opponentChoice == "pierre") ||
    (myChoice == "pierre" && opponentChoice == "ciseaux")||
    (myChoice == "spock" && opponentChoice == "pierre")
            ||
    (myChoice == "lizard" && opponentChoice == "papier")
            ||
    (myChoice == "lizard" && opponentChoice == "spock")
            ||
    (myChoice == "spock" && opponentChoice == "ciseaux")
            ||
    (myChoice == "ciseaux" && opponentChoice == "lizard")
            ||
    (myChoice == "papier" && opponentChoice == "spock")
            ||
    (myChoice == "pierre" && opponentChoice == "lizard")) document.write(win);

        
        else document.write(lose);
};


chifoumi("myChoice");

/*var play = prompt("tu veux joue?").toLowerCase();
while( play === "oui"){
var myChoice = prompt("choisi entre papier , pierre, ciseaux").toLowerCase().trim();  
chifoumi("muChoice");
play = prompt("tu veux encore joue?").toLowerCase();
}*/