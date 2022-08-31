"use strict";
let $= function (id) {
    return  document.getElementById(id);
}
window.addEventListener('load', function() {
    document.getElementById('signupJS').addEventListener('submit', function(e) {

        if (checkForm()){

            this.submit();}
    });

    //https://www.w3schools.com/jsref/met_document_queryselectorall.asp

});




var checkForm = function() {
    $('name_error').innerHTML == '';
    $('last_name_error').innerHTML == '';
    $('email_error').innerHTML == '';
    $('pw_error').innerHTML == '';
    $('pww_error').innerHTML == '';
    $('phone_error').innerHTML == '';


    var isValid = true;

    if ($('name').value.trim() == '') {
        $('name_error').innerHTML = 'Ime ne sme biti prazno';
        isValid = false;
    }

    if ($('last_name').value.trim() == '') {
        $('last_name_error').innerHTML = 'Prezime ne sme biti prazno';
        isValid = false;
    }

    // https://www.w3resource.com/javascript/form/email-validation.php
    var rex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!rex.test($('email').value)) {
        $('email_error').innerHTML = 'Potreban uneti tacan format mejla';
        isValid = false;
    }
    if ($('email').value.trim() == '') {
        $('email_error').innerHTML = 'mejl ne sme biti prazan';
        isValid = false;
    }
    if($('phone').value.trim()==''){
        $('phone_error').innerHTML='Telefon ne sme biti prazan';
    }
    if($('pw').value.trim()==''){
        $('pw_error').innerHTML='Lozinka ne sme biti prazna';
    }
    if($('pww').value.trim()==''){
        $('pww_error').innerHTML='Ponovljena lozinka ne sme biti prazna';
    }
    if($('pw').value.trim()!=$('pww').value.trim()){
        $('pww_error').innerHTML='Nisu iste lozinke';
        $('pw_error').innerHTML='Nisu iste lozinke';
    }






    return isValid;
}