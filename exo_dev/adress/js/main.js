'use strict';


$(function () {

    //$('.edit').on('click', editerContact);
    $(document).on('click', '.edit', editerContact);
    
    $('#save-contact').on('click', onclickAddContact);
    $('#clear-address-book').on('click', onClickClearAdressBook);

    $('#add-contact').on('click', onclickShowForm);
    
    
   
    ShowContactDetails();
  
});