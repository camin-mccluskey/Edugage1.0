<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>View </title>
  </head>
  <body>
<?php
    include 'connect.php';
    // Fetches data regarding name username etc rom login table
    $username = $_COOKIE['username'];
    $sql = "SELECT * FROM login WHERE username = '$username'";
    $query = mysqli_query($connection,$sql);
    $rows = mysqli_fetch_assoc($query);
    $usertype = $rows['usertype'];
    $usertypetable = $usertype . "s";

    // Fetches data regarding class year etc
    $sql = "SELECT * FROM $usertypetable WHERE username = '$username'";
    $query = mysqli_query($connection,$sql);
    $user = mysqli_fetch_assoc($query);

    // Fetches data to do with past quiz performances
    $sql = "SELECT * FROM $username";
    $query = mysqli_query($connection,$sql);
    $quiznum = mysqli_num_rows($query);

// edirect to different types of profile based on usertype
if ($query) {
    if ($usertype == "student") {
      echo "<h1> Welcome ". $user['first_name'] . " " . $user['surname'] . "</h1>";
      // load up data on test results
      echo "<h3>Test Results </h3>
      <table>
            <tr>
            <th> Quiz Name </th>
            <th> Score % </th>
            <th> Time Taken </th>
            </tr>";
      for ($i=0; $i < $quiznum ; $i++) {
        $quizdata = mysqli_fetch_assoc($query);
        echo "<tr>
              <td>" . $quizdata['quiz_name'] . "</td>
              <td>" . $quizdata['score'] . "</td>
              <td>" . $quizdata['time_taken'] . "</td>
              </tr>";

      }
    }
    echo "</table>";

    if ($usertype == "teacher") {
      echo "<h1> Welcome ". $user['first_name'] . " " . $user['surname'] . "</h1>";
      echo "you are a teacher";
      
  }


    if ($usertype == "administrator") {
      echo "<h1> Welcome ". $user['first_name'] . " " . $user['surname'] . "</h1>";
      echo "you are a administrator";
    }

}
?>
  </body>
</html>
