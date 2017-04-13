'use strict';

class FormValidator {

constructor($form){
    this.$form = $form;
    this.$errorMessage = this.$form.find('.error-message');
    this.$totalErrorCount = this.$form.find('#total-error-count');
    this.totalErrors = null;
}

    checkMinimumLength() {
        let  errors;
         errors = [];

        this.$form.find('[data-length]').each(function(){



    let minLength = $(this).data('length');
    let value = $(this).val().trim();

    if ( value.length < minLength ){
         errors.push ({
           fieldName : $(this).data('name'),
             message : 'doit avoir au moins ' + minLength + ' caractère(s)'

        });


    }


    });
        $.merge(this.totalErrors, errors);

    }


    run ()
{
    let obj = this;
    this.$form.on('submit', function(event){

        obj.checkMinimumLength();

        if (obj.totalErrors.length > 0 ){
            event.preventDefault();
        }


    });



}

}




























































/*



FormValidator.prototype.checkDataTypes = function()
{
    var errors;


    errors = new Array();

    this.$form.find('[data-type]').each(function()
    {
        var value;


        value = $(this).val().trim();

        switch($(this).data('type'))
        {
            case 'number':
                if(isNumber(value) == false)
                {
                    errors.push(
                        {
                            fieldName : $(this).data('name'),
                            message   : 'doit Ãªtre un nombre'
                        });
                }
                break;

            case 'positive-integer':
                if(isInteger(value) == false || value <= 0)
                {
                    errors.push(
                        {
                            fieldName : $(this).data('name'),
                            message   : 'doit Ãªtre un nombre entier positif'
                        });
                }
                break;
        }
    });


    $.merge(this.totalErrors, errors);
};



FormValidator.prototype.checkRequiredFields = function()
{
    var errors;


    errors = new Array();

    // Boucle de recherche de tous les champs de formulaires requis.
    this.$form.find('[data-required]').each(function()
    {
        var value;


        value = $(this).val().trim();

        // Est-ce que quelque chose a Ã©tÃ© saisi ?
        if(value.length == 0)
        {
            // Non, alors que le champ est requis, donc il y a une erreur.
            errors.push(
                {
                    fieldName : $(this).data('name'),
                    message   : 'est requis'
                });
        }
    });


    $.merge(this.totalErrors, errors);
};

FormValidator.prototype.onSubmitForm = function(event)
{
    var $errorList;


    $errorList = this.$errorMessage.children('p');
    $errorList.empty();


    this.totalErrors = new Array();

    this.checkRequiredFields();
    this.checkDataTypes();
    this.checkMinimumLength();


    this.$form.data('validation-error-count', this.totalErrors.length);



    if(this.totalErrors.length > 0)
    {
        // Boucle d'affichage de toutes les erreurs trouvÃ©es.
        this.totalErrors.forEach(function(error)
        {
            var message;


            message =
                'Le champ <em><strong>' + error.fieldName +
                '</strong></em> ' + error.message + '.<br>';


            $errorList.append(message);
        });


        this.$totalErrorCount.text(this.totalErrors.length);


        this.$errorMessage.fadeIn('slow');


        event.preventDefault();
    }
};*/

