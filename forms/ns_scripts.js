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
        xmlhttp.open("GET", "worker/pull/strain_form_search.php?q=" + str, true);
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
        xmlhttp.open("GET", "worker/pull/farm_form_search.php?q=" + str, true);
        xmlhttp.send();      
    }
}