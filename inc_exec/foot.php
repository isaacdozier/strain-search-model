
<script>

function strain_srch_2(str) {
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
        xmlhttp.open("GET", "strain_search.php?q=" + str, true);
        xmlhttp.send();      
    }
}

function farm_srch(strnid) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("farmers-list-".concat(strnid)).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "farm_list.php?q=" + strnid, true);
        xmlhttp.send();      
}

function retail_srch(strn_id, lotid) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("retail-list-".concat(strn_id)).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "retail_list.php?sq=" + strn_id + "&lq=" + lotid, true);
        xmlhttp.send();      
}

</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>