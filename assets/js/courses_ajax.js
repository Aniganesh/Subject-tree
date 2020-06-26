"use strict";
function fetchCategories(value) {
    const results = document.querySelector("#results");
    if (value == null) {
        const searchInp = document.querySelector("#searchcat");
        value = searchInp.value;
    }
    if (value == '') {
        getAllCategories()
        return;
    }
    let XHR;
    if (window.XMLHttpRequest) {
        XHR = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        XHR = new ActiveXObject("Microsoft.XMLHTTP");
    }
    XHR.onreadystatechange = function () {
        if (XHR.readyState == XHR.DONE && XHR.status == 200) {
            results.innerHTML = this.responseText;
        }
    }
    XHR.open('GET', "getcategories/" + value);
    XHR.send();
}


function getAllCategories() {
    const results = document.querySelector("#results");
    let XHR;
    if (window.XMLHttpRequest) {
        XHR = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        XHR = new ActiveXObject("Microsoft.XMLHTTP");
    }
    XHR.onreadystatechange = function () {
        if (XHR.readyState == XHR.DONE && XHR.status == 200) {
            results.innerHTML = this.responseText;
        }
    }
    XHR.open('GET', "getAllCategories/");
    XHR.send();
}