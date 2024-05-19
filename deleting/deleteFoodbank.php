<?php
//from previous lesson
$foodbankID= isset($_GET["id"])?$_GET["id"]:"";
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
$sql = "DELETE FROM foodbank WHERE foodbankID=$foodbankID;";
if (mysqli_query($conn,$sql)) {
  echo "Record deleted successfully";
}else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>