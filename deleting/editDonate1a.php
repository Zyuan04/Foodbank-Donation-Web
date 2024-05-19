<?php
//from previous lesson
$itemID = empty($_POST["itemID"])?"":$_POST["itemID"];
$itemName= (!empty($_POST["itemName"]))?$_POST["itemName"]:"";
$description = empty($_POST["description"])?"":$_POST["description"];
$price= (!empty($_POST["price"]))?$_POST["price"]:"";

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

$sql = "UPDATE Donate SET
itemID='$itemID',
itemName='$itemName',
description='$description',
price=$price
WHERE itemID=$itemID;";

echo $sql;

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>

