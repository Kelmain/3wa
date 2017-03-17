'use strict';

function creatContact(title, lastName, firstName, phone) {

    var contact = {
        'title': title,
        'lastName': lastName.toUpperCase(),
        'firstName': firstName,
        'phone': phone
    };


    return contact;

}

function loadAddresseBook() {

    var addressebook;
    addressebook = localStorage.getItem('addressebook');

    if (addressebook == null) {

        addressebook = [];
    } else {
        addressebook = JSON.parse(addressebook);
    }
    return addressebook;
}




