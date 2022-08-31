"use strict";
let $= function (id) {
    return  document.getElementById(id);
}
window.addEventListener('load', function() {
    document.getElementById('logK').addEventListener('submit', function(e) {

        if (checkForm()){

            this.submit();}
    });

    //https://www.w3schools.com/jsref/met_document_queryselectorall.asp

});
var checkForm=function (){

   /* $('passL').innerHTML == '';
    $('emailL').innerHTML == '';*/

    var isValid = true;

    if ($('name').value.trim() == '') {
        $('passL_error').innerHTML = 'Email ne sme biti prazan';
        isValid = false;
    }

    if ($('last_name').value.trim() == '') {
        $('emailL_error').innerHTML = 'Lozinka ne sme biti prazna';
        isValid = false;
    }
    return isValid;
}