/* Following a click event on the searched user field this will trigger a removal
of the user from the login db, remove their own db, and remove them from any classes they
happen to be in */

function deleteUser(username) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
  document.getElementById("deleteConfirm").innerHTML = xmlhttp.responseText;
  }
};
xmlhttp.open("GET", "deleteUser.php?q=" + username, true);
xmlhttp.send();
}
