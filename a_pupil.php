<?php
session_start();
?>
<!DOCTYPE html>
<html lang = en>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<title> A Pupil. </title>

	<style>
		img {
		position: absolute;
		top: 10px;
		right: 10px;
		}

		table {
		width: 68%;
		}

		table, th, td{
		border: 1px solid;
		}

		.entry:hover {
		background-color: blue;
		}
	</style>
</head>

<body>
<?php
include ("connect.php");
$reference = $_POST['reference'];
$query = $_SESSION['query'];
$result  = mysqli_query($connection,$query);
$i = 0;
while ($row = mysqli_fetch_row($result)) {
	if ($i == $reference) {
			$ID = $row[0];
			$firstname  = $row[1];
			$surname = $row[2];
			$username = $row[3];
			$year = $row[4];
			$form = $row[5];
		}
$i++;
}

echo '<h2>', $firstname, ' ', $surname , ' - ', $year, $form, '</h2>';
?>
<img src = "http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/p/pupil.jpg" alt = "pupil" height= "30%" width= "30%">
	<table>
	<tr>
		<th> Subject </th>
		<th> Average </th>
		<th> Class Rank </th>
	</tr>
	<tr class = "entry">
		<td> example </td>
		<td> example </td>
		<td> example </td>
	</tr>
	</table>
</body>
