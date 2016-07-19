function deleteEntry(className,teacher) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("myClasses").innerHTML = xmlhttp.responseText;
      }
  };

  xmlhttp.open("GET", "deleteClass.php?q=" + className + "&teacher=" + teacher, true);
  xmlhttp.send();
}
