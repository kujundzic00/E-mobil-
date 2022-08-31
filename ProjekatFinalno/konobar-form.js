"use strict";


let $= function (id) {
    return  document.getElementById(id);
}
window.addEventListener('load', function() {
    document.getElementById('konobarProvera').addEventListener('submit', function(e) {

        if (checkForm()){

            this.submit();}
    });

    //https://www.w3schools.com/jsref/met_document_queryselectorall.asp

});




var checkForm = function() {

    $('pusenjeE').innerHTML == '';
    $('rezervacijaE').innerHTML == '';




    var isValid = true;



    if ($('dane').value.trim() == '') {
        $('daneE').innerHTML = 'Morate izabrate 1 ako je dosao ili 0 ako nije dosao';
        isValid = false;
    }

    if ($('rezervacija').value.trim() == '') {
        $('rezervacijaE').innerHTML = 'Kod rezervacije ne sme biti prazan';
        isValid = false;
    }








    return isValid;
}