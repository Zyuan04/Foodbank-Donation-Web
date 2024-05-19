<?php
//from previous lesson
$itemID= isset($_GET["id"])?$_GET["id"]:"";
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
$sql = "DELETE FROM donate WHERE itemID=$itemID;";
if (mysqli_query($conn,$sql)) {
  echo "Record deleted successfully";
}else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>