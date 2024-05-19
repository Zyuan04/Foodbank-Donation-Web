<?php
//from previous lesson
$foodbankID = isset($_POST["foodbankID"])?$_POST["foodbankID"]:"";
$foodbankName = (!empty($_POST["foodbankName"]))?$_POST["foodbankName"]:"";
$memberID = isset($_POST["memberID"])?$_POST["memberID"]:"";
$memberName = (!empty($_POST["memberName"]))?$_POST["memberName"]:"";
$quantity = isset ($_POST["quantity"])?$_POST["quantity"]:"";
$total="0.00";
//set-up
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

$sql = "INSERT INTO donation (foodbankID, foodbankName, memberID, memberName, quantity) VALUES
('$locationID','$locationName','$memberID','$memberName','$quantity');";

//echo $sql;

if (mysqli_query($conn, $sql)) {
  echo "Donate successfully";
  ?><a href="Confirmation.php" class="button"><b>Confirm</b></a>
  <?php
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql1="SELECT price FROM donate;";

$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row=mysqli_fetch_assoc($result)) {
   // print_r($row);
?>
   <?php $total=$total+($quantity*$row["price"])?>
<?php
 }
} else {
 echo "0 results";
}
mysqli_close($conn);
?>
