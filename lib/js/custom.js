$( function(){
    var x = document.getElementById("search_txt").value;
    if (x.length == 0) { 
        document.getElementById("strain_txt").innerHTML = "";
        return;
    }else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("strain_txt").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "build/strain_search.php?q=" + x, true);
        xmlhttp.send(); 
    }
    console.log(x);
});

//SEARCH functions
function strain_this(str) {
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("strain_txt").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "build/strain_this.php?q=" + str, true);
        xmlhttp.send(); 
}

function strain_srch_hint(str) {
    if (str.length == 0) { 
        document.getElementById("strain_txt").innerHTML = "";
        document.getElementById("strain_txt_hint").setAttribute("style", "display:none");
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("strain_txt_hint").innerHTML = xmlhttp.responseText;
                document.getElementById("strain_txt_hint").setAttribute("style", "display:block");
            }
        }
        xmlhttp.open("GET", "build/strain_hint.php?q=" + str, true);
        xmlhttp.send();      
    }
}

function strain_srch(str) {
    if (str.length == 0) { 
        document.getElementById("strain_txt").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("strain_txt").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "build/strain_search.php?q=" + str, true);
        xmlhttp.send();      
    }
}

function lot_rate(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("rate-list-".concat(str)).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "build/strain_rate.php?q=" + str, true);
        xmlhttp.send();
}

function retail_srch(strn_id, lotid) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("retail-list-".concat(lotid)).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "build/retail_list.php?sq=" + strn_id + "&lq=" + lotid, true);
        xmlhttp.send();      
}

function reviews(lot) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("reviews-".concat(lot)).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "build/review_list.php?q=" + lot, true);
        xmlhttp.send();      
}

//FORM funtions 
function strain_form(str) {
    if (str.length == 0) { 
        document.getElementById("strain_form_txt").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("strain_form_txt").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "strain_form_search.php?q=" + str, true);
        xmlhttp.send();      
    }
}

function farm_form(str) {
    if (str.length == 0) { 
        document.getElementById("farm_form_txt").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("farm_form_txt").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "farm_form_search.php?q=" + str, true);
        xmlhttp.send();      
    }
}