"use strict";


let $= function (id) {
    return  document.getElementById(id);
}
window.addEventListener('load', function() {
    document.getElementById('admin-form').addEventListener('submit', function(e) {

        if (checkForm()){

            this.submit();}
    });

    //https://www.w3schools.com/jsref/met_document_queryselectorall.asp

});




var checkForm = function() {
    $('smokeE').innerHTML == '';
    $('textAE').innerHTML == '';
    $('inputME').innerHTML == '';



    var isValid = true;

    if ($('smoke').value.trim() == '') {
        $('smokeE').innerHTML = 'Izaberite pusacki ili nepusacki deo';
        isValid = false;
    }

    if ($('textA').value.trim() == '') {
        $('textAE').innerHTML = 'Dodajte opis';
        isValid = false;
    }

    if ($('inputM').value.trim() == '') {
        $('inputME').innerHTML = 'Dodajte odredjeni broj mesta';
        isValid = false;
    }







    return isValid;
}