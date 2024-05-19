<?php
$foodbankID = isset($_GET["id"])?$_GET["id"]:"";

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
$sql="SELECT * FROM foodbank WHERE foodbankID=$foodbankID;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row=mysqli_fetch_assoc($result)) {
   $foodbankID=$row["foodbankID"]; 
	$foodbankName=$row["foodbankName"];
}
}
?>
<form id="donation" name="donation" action="donation1a.php" method="POST">
<label for="foodbankID">Foodbank ID:</label>
<input type="text"size="30" id="foodbankID" name="foodbankID" readonly value="<?php echo $foodbankID?>"><br>
<label for="foodbankID">Foodbank Name:</label>
<input type="text"size="30" id="foodbankName" name="foodbankName" readonly value="<?php echo $foodbankName?>"><br>
<label for="memberID">Member ID: </label>
<input type="text"size="30" id="memberID" name="memberID" maxlength="30" placeholder="" required><br>
<label for="memberName">Member Name: </label>
<input type="text"size="50" id="memberName" name="memberName" maxlength="50" placeholder="" required><br>
<p>Each foodbox contain: </p>
<?php

$sql1="SELECT * FROM donate;";

$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row=mysqli_fetch_assoc($result)) {
   // print_r($row);
?>
   <p> - <?php echo $row["itemName"]?>
   <?php echo $row["description"]?> 
   <?php echo "~ RM", $row["price"]?>
<?php
 }
 ?>
 <br><br>
 <label for="quantity">Quantity :</label>
   <input type="number" id="quantity" name="quantity"><br>
   Action: <input type="submit" id="send" name="send">
   <?php
} else {
 echo "0 results";
}
mysqli_close($conn);
?>
</form>

