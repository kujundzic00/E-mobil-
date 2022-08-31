"use strict";
window.addEventListener('load', init);
let $= function (id) {
    return  document.getElementById(id);
}

function init() {

    setInterval(loadData, 2000);

}


function loadData() {

    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            $("total2").innerHTML = xmlhttp.responseText;
        }
    };

    xmlhttp.open("GET", "adminReservations.php", true);
    xmlhttp.send();
}