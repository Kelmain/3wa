'use strict';



function onClickAddContact() {

    $('#contact-form').trigger('reset');


    $('#contact-form').data('mode', 'add').fadeIn('fast');
}

function onClickClearAdressBook() {

    saveAddressBook(new Array());


    $('#contact-details').hide();
    refreshAddressBook();
}

function onClickEditContact() {
    var addressBook;
    var contact;
    var index;


    index = $(this).data('index');

    addressBook = loadAddressBook();
    contact = addressBook[index];

    $('#firstName').val(contact.firstName);
    $('#lastName').val(contact.lastName);
    $('#phone').val(contact.phone);


    switch (contact.title) {
    case 'Mme.':
        $('#title').val(1);
        break;

    case 'Mlle.':
        $('#title').val(2);
        break;

    case 'M.':
        $('#title').val(3);
        break;
    }


    $('#contact-form').data('mode', 'edit').fadeIn('slow');
}

function onClickSaveContact() {
    var addressBook;
    var contact;
    var index;


    contact = createContact(
        $('select[name=title]').val(),
        $('input[name=firstName]').val(),
        $('input[name=lastName]').val(),
        $('input[name=phone]').val()
    );

    addressBook = loadAddressBook();

    if ($('#contact-form').data('mode') == 'add') {


        addressBook.push(contact);
    } else {


        index = $('#contact-details a').data('index');

        addressBook[index] = contact;
    }

    saveAddressBook(addressBook);


    $('#contact-form').fadeOut('slow');
    $('#contact-details').hide();
    refreshAddressBook();
}

function onClickShowContactDetails() {
    var addressBook;
    var contact;
    var index;


    index = $(this).data('index');


    addressBook = loadAddressBook();
    contact = addressBook[index];


    $('#contact-details h3').text(contact.title + ' ' + contact.firstName + ' ' + contact.lastName);
    $('#contact-details p').text(contact.phone);
    $('#contact-details a').data('index', index);


    $('#contact-details').toggle();
}