'use strict';


function createTable() {
    var tc = document.getElementById('grille');

    //creation tableau HTML
    tc.innerHTML = ['<table cellspacing="0"><tbody>',
                    new Array(10).join(getLine()),
                    '</tbody></table>'
                   ].join('');
    // recuperation du tableau dans la grille
    var t = tc.getElementsByTagName('table')[0];

    //récupération tableau sudoku
    var s = sudoku();
    //ajout classes CSS sur certaines cellules + ajout du nombre dans la cellule
    for (var i = 0; i < 9; i++) {
        for (var j = 0; j < 9; j++) {
            var c = t.rows[i].cells[j];
            //bordure droite accentuee
            if (j % 3 == 2)
                c.className = "borderRightCol";
            //bordure bas accentuee
            if (i % 3 == 2)
                c.className += " borderBottomCol";
            // colorier la cellule en gris une fois sur 2
            if ((i + j) % 2 == 1)
                c.className += " grey";
            //integration chiffre du tableau de chiffres généré 
            c.getElementsByTagName('input')[0].value = s[j][i];

        }
    }



}

function getLine() {
    return ['<tr>',
            new Array(10).join('<td><input type="text" size="1" maxlength="1"></td>'),
            '</tr>'].join('');
}


createTable();