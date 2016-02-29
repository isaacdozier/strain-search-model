//LOAD fucntion
$(document).ready(function(){

    //path builder helpers
    var q;
    var t;
    var v;
    var i

    var base = "http://localhost:8012/build/chain.php"

    var arr = [["query"   ,   "grid"], 
               ["strain"  ,   "grid"],
               ["farm"    ,   "grid"], 
               ["shi"     ,   "grid"],
               ["custom_q",   "grid"],
               ["lot"     ,   "view"]];

    for (i = 0; i < arr.length; i++) { 
        if(document.getElementById(arr[i][0]).value){
            t   = arr[i][0];
            v   = arr[i][1];
            q   = document.getElementById(arr[i][0]).value.replace('-', ' ');
        }
    }

    if(q){  
        p = base +"?q="+q
                 +"&type="+t
                 +"&view="+v
                 +"&search=true" 
    }

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = 'test';
        }
    }

    xmlhttp.open("GET", p, true);

    xmlhttp.send();
});

function view_this(v,t,q) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(t+"-".concat(q)).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "http://localhost:8012/build/chain.php?q="+q+'&type='+t+'&view='+v, true);
    xmlhttp.send();      
}

function s(v,d) {
    var x = '';
    if (v.length == 0 && document.getElementById(d)) { 
        document.getElementById(d).innerHTML = '';
        return;
    } else {
        if (v.length < 1)x = 'hint';
        if (v.length > 1)x = 'hinter';

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(d).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", 'http://localhost:8012/build/hint.php?q='+v+'&view=hint&type=search', true);
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
    xmlhttp.open("GET", "http://localhost:8012/build/farm_list.php?q=" + strnid, true);
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
        xmlhttp.open("GET", "http://localhost:8012/forms/worker/pull/"+x+"_f_s.php?q=" + v, true);
        xmlhttp.send();      
    }
}

function f(b,f,v) {
    if (document.getElementById("lot_id")) { 
        v = document.getElementById("lot_id").value;
    } else {
        v = 'ns';
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("form_content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", 'http://localhost:8012/forms/chain.php?b='+b+'&f='+f+'&v='+v, true);
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
    xmlhttp.open("POST", "http://localhost:8012/forms/chain.php?img_data="+z, true);
    xmlhttp.send(); 
}
