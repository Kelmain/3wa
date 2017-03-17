'use strict';



function onclickShowForm() {
    $('#contact-form').toggle();
}

function onclickAddContact() {
    var contact = creatContact($('#title').val(),
        $('#lastName').val(),
        $('#firstName').val(),
        $('#phone').val()
    )

    var addressebook = loadAddresseBook();
    
var id_contact = $('#contact-form').data('contact');
if(id_contact == 'add'){
    addressebook.push(contact);
}else{
   

        addressebook[id_contact] = contact;
}
    
    
    
    
    localStorage.setItem('addressebook', JSON.stringify(addressebook));
          ShowContactDetails() ;
    $('#contact-form').trigger('reset', $('#contact-form').data('contact', add));
}

function onClickClearAdressBook() {
    localStorage.removeItem('addressebook');



}

function ShowContactDetails() {
    var addressebook = loadAddresseBook();

    $("#contact-details").html("");
    for (var i = 0; i < addressebook.length; i++) {

        $("#contact-details").append('<ul><li>' +
            addressebook[i].title + '</li> ' + '<li>' +
            addressebook[i].firstName + ' ' + addressebook[i].lastName + '</li>' + '<li>' + addressebook[i].phone + '</li><a class="edit" href="javascript:;" data-index="'+i+'">Editer</a> </ul> ');
        


    }
  

}

function editerContact() 
{
   
    var addressebook = loadAddresseBook();
    var  index = $(this).data('index');
    
    $('#contact-form').data('contact', index)
    
    $("#title").val(addressebook[index].title);	
	$("#lastName").val(addressebook[index].lastName); 	
	$("#firstName").val(addressebook[index].firstName); 	
	$("#phone").val(addressebook[index].phone);		
   
    
}
