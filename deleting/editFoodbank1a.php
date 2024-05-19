<?php
//from previous lesson
$foodbankID = empty($_POST["foodbankID"])?"":$_POST["foodbankID"];
$foodbankName= (!empty($_POST["foodbankName"]))?$_POST["foodbankName"]:"";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE foodbank SET
foodbankID='$foodbankID',
foodbankName='$foodbankName'
WHERE foodbankID=$foodbankID;";

echo $sql;

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>

