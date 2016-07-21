function addstudent(id,classname) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("studentAdded").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "addstudenttoclass.php?q=" + id + "&classname=" + classname, true);
        xmlhttp.send();
    }
