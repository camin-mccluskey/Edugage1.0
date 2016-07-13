<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <title>View </title>
  </head>
  <body>
<?php
    include 'connect.php';
    mysqli_select_db($connection,"login");
    // Fetches data regarding name username etc from login table
    $username = $_COOKIE['username'];
    $sql = "SELECT * FROM login WHERE username = '$username'";
    $query = mysqli_query($connection,$sql);
    $user = mysqli_fetch_assoc($query);

    // Define the type of user
    $usertype = $user['usertype'];

    // Fetches data to do with past quiz performances
  //  $sql = "SELECT * FROM $username";
    //$query = mysqli_query($connection,$sql);
    // $quiznum = mysqli_num_rows($query);

// edirect to different types of profile based on usertype
if ($query) {
    if ($usertype == "student") {
      echo "<h1> Welcome ". $user['first_name'] . " " . $user['surname'] . "</h1>";
      /* load up data on test results - when i sort this databse
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
    */
} // this bracket needs removed when quiz db is sorted

    else if ($usertype == "teacher") {
      echo "<h1> Welcome ". $user['first_name'] . " " . $user['surname'] . "</h1>";
      echo "you are a teacher";

  }
    else if ($usertype == "administrator") {
      echo "<h1> Welcome ". $user['first_name'] . " " . $user['surname'] . "</h1>";
      echo "you are a administrator";
    }
    else {
      echo "usertype undefined";
    }
}
?>
  </body>
</html>
