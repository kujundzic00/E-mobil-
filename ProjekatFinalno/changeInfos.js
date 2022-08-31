"use strict";

let $= function (id) {
    return  document.getElementById(id);
}
window.addEventListener('load', function() {
    document.getElementById('changeInfos').addEventListener('submit', function(e) {

        if (checkForm()){

            this.submit();}
    });

    //https://www.w3schools.com/jsref/met_document_queryselectorall.asp

});
var checkForm=function (){

    /* $('passL').innerHTML == '';
     $('emailL').innerHTML == '';*/

    var isValid = true;

    if ($('changeN').value.trim() == '') {
        $('changeNE').innerHTML = 'ime ne sme biti prazno';
        isValid = false;
    }

    if ($('changeL').value.trim() == '') {
        $('changeLE').innerHTML = 'Prezime ne sme biti prazno';
        isValid = false;
    }
    if ($('changeMP').value.trim() == '') {
        $('changeMPE').innerHTML = 'Email ne sme biti prazan';
        isValid = false;
    }

    if ($('changeP').value.trim() == '') {
        $('changePE').innerHTML = 'Lozinka ne sme biti prazna';
        isValid = false;
    }
    if ($('changePP').value.trim() == '') {
        $('changePPE').innerHTML = 'Ponavljena lozinka ne sme biti prazna';
        isValid = false;
    }


    return isValid;
}
