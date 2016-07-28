/* This function takes the name of the content you want to load and sends it to a
PHP file specified by the phpFile variable. The response is loaded into the htmlContainer
*/

function loadContent(content, htmlContainer, phpFile) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(htmlContainer).innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", phpFile+"?q=" + content, true);
        xmlhttp.send();
    }
