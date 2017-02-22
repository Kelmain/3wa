'use strict';
/*function DisplayTable() {

    var colStart = parseInt(document.getElementById("startCol").value);
    var colEnd = parseInt(document.getElementById("endCol").value);
    var rowStart = parseInt(document.getElementById("startRow").value);
    var rowEnd = parseInt(document.getElementById("endRow").value);
    var color_td

    var htmlBuffer = "<table border='1'>";

    for (var i = rowStart; i <= rowEnd; i++) {

        htmlBuffer += "<tr>";

        for (var j = colStart; j <= colEnd; j++) {

           

            if (i == j) {
                color_td = "#fff";
            } else {
                color_td = "#ccc";
            }
             htmlBuffer += "<td style=\"background-color:" + color_td + "\">" + (i * j) + "</td>";
        }


        htmlBuffer += "</tr>";
    }


    htmlBuffer += "</table>";


    document.getElementById("multiTable").innerHTML = htmlBuffer;
}*/






// déclaration des variables
var multiplyTable;
var column;
var row;
var color_td1;
var end;
var html;

end = parseInt(window.prompt("le fin de multiplication", 0));
html = "<table border='1px'>";
multiplyTable = new Array();

for (row = 1; row <= end; row++) {
    multiplyTable[row] = new Array();
    for (column = 1; column <= end; column++) {
        multiplyTable[row][column] = row * column;

    }

}

for (row = 1; row <= end; row++) {
    html += "<tr>";
    for (column = 1; column <= end; column++) {


        color_td1 = (row == column) ? "#ccc" : "#fff";

        html += "<td style='width:30px;background-color:" + color_td1 + "'>";
        html += multiplyTable[row][column];
        html += "</td>";

    }
    html += "</tr>";

}


html += "</table>";

document.write(html);








/*var color_td;
var i;
var j;
document.write("<table border='1px'>");

for ( i = 1; i <= 10; i++) {

    document.write("<tr style='height:30px;'>");

    for ( j = 1; j <= 10; j++) {

        if (j === i) {
            color_td = "#ccc";
        } else {
            color_td = "#fff";
        }

        document.write("<td style='width:30px;background-color:" + color_td + "'>" + i * j + "</td>");
    }
    document.write("</tr>");
}

document.write("</table>");



*/


/*
var column;
var row;
var color_td;
var multiplyTable;
var fin;
var html;
fin = parseInt(window.prompt("Jusqu'a quelle table souhaitez vous aller ?", 0));
html = "<h1>Table de multiplication</h1>";
html += "<table>";
multiplyTable = new Array();
for (row = 1; row <= fin; row++) {
    multiplyTable[row] = new Array();
    for (column = 1; column <= fin; column++) {
        multiplyTable[row][column] = row * column;
    }
}
for (row = 1; row <= fin; row++) {
    html += '<tr>';
    for (column = 1; column <= fin; column++) {
        if (row == column) {
            color_td = "#447FB6";
            html += "<td style='background-color:" + color_td + "'>";
        } else {
            color_td = "#BFA836";
            html += "<td style='background-color:" + color_td + "'>";
        }
        html += multiplyTable[row][column];
        html += '</td>';
    }
    html += '</tr>';
}
html += '</table>';
document.write(html);
*/