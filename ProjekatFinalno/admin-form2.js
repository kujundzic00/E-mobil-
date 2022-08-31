"use strict";


let $= function (id) {
    return  document.getElementById(id);
}
window.addEventListener('load', function() {
    document.getElementById('admin-form2').addEventListener('submit', function(e) {

        if (checkForm()){

            this.submit();}
    });

    //https://www.w3schools.com/jsref/met_document_queryselectorall.asp

});




var checkForm = function() {
    $('userE').innerHTML == '';
    $('imeE').innerHTML == '';
    $('prezimeE').innerHTML == '';
    $('pwE').innerHTML == '';



    var isValid = true;

    if ($('user').value.trim() == '') {
        $('userE').innerHTML = 'Morate napisati  korisnicko ime';
        isValid = false;
    }

    if ($('ime').value.trim() == '') {
        $('imeE').innerHTML = 'Ime ne sme biti prazno';
        isValid = false;
    }

    if ($('prezime').value.trim() == '') {
        $('prezimeE').innerHTML = 'Prezime ne sme biti prazno';
        isValid = false;
    }
    if ($('pw').value.trim() == '') {
        $('pwE').innerHTML = 'Lozinka ne sme biti prazna';
        isValid = false;
    }







    return isValid;
}