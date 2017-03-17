'use strict';



const DOM_STORAGE_ITEM_NAME = 'Address Book';





function createContact(title, firstName, lastName, phone)
{
    var contact;

    contact           = new Object();
    contact.firstName = firstName;
    contact.lastName  = lastName.toUpperCase();
    contact.phone     = phone;

    switch(title)
    {
        case '1':
        contact.title = 'Mme.';
        break;

        case '2':
        contact.title = 'Mlle.';
        break;

        case '3':
        contact.title = 'M.';
        break;
    }

    return contact;
}

function loadAddressBook()
{
    var addressBook;

   
    addressBook = loadDataFromDomStorage(DOM_STORAGE_ITEM_NAME);

    
    if(addressBook == null)
    {

        addressBook = new Array();
    }

    return addressBook;
}

function refreshAddressBook()
{
    var addressBook;
    var addressBookList;
    var hyperlink;
    var index;

    addressBook = loadAddressBook();

    
    $('#address-book').empty();

   
    addressBookList = $('<ul>');


    
    for(index = 0; index < addressBook.length; index++)
    {
        
        hyperlink = $('<a>').attr('href', '#').data('index', index).text
        (
            addressBook[index].firstName + ' ' + addressBook[index].lastName
        );

        
        addressBookList.append($('<li>').append(hyperlink));
    }

    $('#address-book').append(addressBookList);
}

function saveAddressBook(addressBook)
{
    
    saveDataToDomStorage(DOM_STORAGE_ITEM_NAME, addressBook);
}