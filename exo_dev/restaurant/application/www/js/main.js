'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //

/////////////////////////////////////////////////////////////////////////////////////////
function runFormValidation()
{


    let $form;
    let formValidator;


    $form = $('form:not([data-no-validation=true])'); // document.querySelector('form')

    if($form.length >= 1 ){
        formValidator = new FormValidator($form);
        formValidator.run();


    }

}






/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

$(function () {

   runFormValidation();




    $('#meal').on('change', function () {
        //alert($(this).val());

        $.getJSON('meal',
            {idMenu: $(this).val()},
            function (data) {
                //console.log(data);

                $('.nom').text(data.Name);

                $('#photo').attr('src', getWwwUrl() + '/images/meals/' + data.Photo);
                $('.description').text(data.Description);
                $('.prize').text(data.SalePrice).data('prize', data.SalePrice);
                $('#qte').val(1).trigger('change');

            }
        );

    }).trigger('change');




    $('#qte').on('change', function () {
        $('.total_prize').text( ($(this).val()*$('.prize').data('prize')).toFixed(2) );

    });


    $('#add_panier').on('click', function () {
       var quantite = $('select[name="qte"] option:selected').val();
       var idMenu = $('select[name="menu"] option:selected').val();
        $.get(getRequestUrl()+'/basket', {idMeal : idMenu, qte : quantite}, function(retourHtml) {
            $('#shopping-cart-results').html(retourHtml);
        });

    });

    $( ".cart-box").click(function(e) { //when user clicks on cart box
        e.preventDefault();
        $(".shopping-cart-box").fadeIn(); //display cart box
        $("#shopping-cart-results").html('<img src="'+getWwwUrl()+'/images/ajax-loader.gif">'); //show loading image
        $("#shopping-cart-results" ).load( "Basket"); //Make ajax request using jQuery Load() & update results
    });
    $( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
        e.preventDefault();
        $(".shopping-cart-box").fadeOut(); //close cart-box
    });

    $('.shopping-cart-box').on('click','.del', function() {
        //event.preventDefault();

   var deletes = $(this).parents('li').data('id');
//console.log(deletes);
        $.get(getRequestUrl()+'/basket',{deletes : deletes }, function (retourHtml) {
            $('#shopping-cart-results').html(retourHtml);
        });



    });

});


