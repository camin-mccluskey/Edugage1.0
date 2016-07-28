<?php
include 'connect.php';
/* Following a click event on the searched user field this will trigger a removal
of the user from the login db, remove their own db, and remove them from any classes they
happen to be in. The GET request comes from deleteUser.js */

$username = $_REQUEST['q'];

// Delete user from login table
    mysqli_select_db($connection,"login");
    $sql = "DELETE FROM login WHERE username = '$username'";
    mysqli_query($connection,$sql) or die ("Error: Could not delete user from login database");

    
?>
