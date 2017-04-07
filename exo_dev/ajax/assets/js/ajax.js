'use strict';



function ajaxGetHtml(html)
{
    
    $('#target').html(html);
}

function ajaxGetJson(contactList)
{

    $('#target').empty().append('<ul>');

    for(var i = 0; i < contactList.length; i++)
    {
        
        $('<li>').append
        (
            '<p><strong>Prenom</strong> : ' + contactList[i].firstName + '</p>',
            '<p><em>Telephone</em> : '      + contactList[i].phone     + '</p>'
        ).appendTo('#target ul');
    }
}

function ajaxGetMovies(Movies)
{
    
    $('#target').html(Movies);
}