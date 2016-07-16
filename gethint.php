<?php

// Search quiz database
include 'connect.php';
mysqli_select_db($connection,"login");
$sql = "SELECT * FROM login";
$query = mysqli_query($connection,$sql) or die("DB Error");
while ($entries = mysqli_fetch_row($query)){
  $a[] = $entries[6];
}


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>
