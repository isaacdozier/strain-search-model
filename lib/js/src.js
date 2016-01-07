//LOAD fucntion
$(document).ready(function(){
    var x = document.getElementById("q_txt").value;
    var t = document.getElementById("q_type").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "build/chain.php?q="+x+"&b=grid&type="+t, true);
    xmlhttp.send(); 
    
    console.log(x);
});


//SEARCH functions
function strain_this(x) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "build/chain.php?q="+x+"&b=view&type=this", true);
    xmlhttp.send(); 
}

function view_this(b,v) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(b+"-".concat(v)).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "build/chain.php?b=" + b +'&q='+v+'&type=this', true);
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
        xmlhttp.open("GET", "build/chain.php?b=" + x +'&q='+v+'&type=search', true);
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

function f(b,f,v) {
    var lot = document.getElementById("lot_id").value;
    if (lot.length !== 0) { 
        v = lot;
    } else {
        v = 'ns';
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("form_content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", 'forms/chain.php?b='+b+'&f='+f+'&v='+v, true);
    xmlhttp.send(); 
}

function submit_img() {
    var z = document.getElementById("img_data").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "forms/chain.php?img_data="+z, true);
    xmlhttp.send(); 
}


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
