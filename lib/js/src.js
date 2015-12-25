$(document).ready(function(){
    var x = document.getElementById("q_txt").value;
    var t = document.getElementById("q_type").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "build/s_chain.php".concat("?q="+x+"&b=grid&type="+t), true);
    xmlhttp.send(); 
    
    console.log(x);
});

function submit_img() {
    var z = document.getElementById("img_data").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", 
          "forms/f_chain.php?img_data="+z, true);
    xmlhttp.send(); 
}

function f(b,f,t,v) {
    var lot = document.getElementById("lot_id").value;
    if (lot.length !== 0) { 
        v = lot;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("form_content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", 'forms/f_chain.php?b='+b+'&f='+f+'&t='+t+'&v='+v, true);
    xmlhttp.send(); 
}



//SEARCH functions
function strain_this(str) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "build/s_view.php?q=" + str, true);
    xmlhttp.send(); 
}

function s_hint(v) {
    var x = '';
    if (v.length == 0) { 
        document.getElementById("strain_txt_hint").innerHTML = '';
        return;
    } else {
        x = 'hint';

        if (v.length > 1) 
        {x = 'hinter';}

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("strain_txt_hint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "build/s_"+x+".php?q=" + v, true);
        xmlhttp.send();      
    }
}

function farm_srch(strnid) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("f-list-".concat(strnid)).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "build/farm_list.php?q=" + strnid, true);
    xmlhttp.send();      
}

function retail_srch(b,v) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("retail-list-".concat(v)).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "build/s_chain.php?b=" + b +'&q='+v, true);
    xmlhttp.send();      
}

function reviews(b,v) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("reviews-".concat(v)).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "build/s_chain.php?b=" + b +'&q='+v, true);
    xmlhttp.send();      
}

//FORM funtions
//find & fill forms with searched values 
function _f_s(v,x) {
    if (v.length == 0) { 
        document.getElementById(x+"_form_txt").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(x+"_form_txt").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "forms/worker/pull/"+x+"_f_s.php?q=" + v, true);
        xmlhttp.send();      
    }
}