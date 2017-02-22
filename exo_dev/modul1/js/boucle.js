'use strict'


var index;
var numbers = ['banane', 'fraise', 'carambole', 'litchi', 'durian', 'goyave'];

document.write('<ol>');

for (index = 0; index < numbers.length ; index ++) {
    document.write('<li><strong>' + index + ':<strong>' + numbers[index] + '<li>');
}
document.write('</ol>');