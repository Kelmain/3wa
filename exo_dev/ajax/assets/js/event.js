'use strict';


function onClickGO()
{
    var radioChoice;

    
    radioChoice = $('input[name=what]:checked').val();

   
    switch(radioChoice)
    {
       
        case '1':
        $.get('php/html.php', ajaxGetHtml);
        break;

       
        case '2':
        $.getJSON('php/json.php', ajaxGetJson);
        break;

       
        case '3':
        $.get('php/movies.php', ajaxGetMovies);
        break;
    }
}