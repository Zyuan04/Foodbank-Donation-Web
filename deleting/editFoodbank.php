<?php
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

$sql = "SELECT * FROM foodbank WHERE foodbankID=$foodbankID;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	$foodbankID=$row["foodbankID"]; 
	$foodbankName=$row["foodbankName"];
  }
} 
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head><title>Web Form - POST/GET</title></head>
<body>
	<form id="foodbank" name="foodbank" action="editfoodbank1a.php" method="POST">
	
		<label for="itemID">Foodbank ID</label>
		<input type="text" id="foodbankID" name="foodbankID" maxlength="10" readonly value="<?php echo $foodbankID?>"><br>

		<label for="name">Foodbank Name</label>
		<input type="text" id="foodbankName" 
		name="foodbankName" maxlength="30" placeholder="" value="<?php echo $foodbankName?>"><br>
		
		<fieldset>
		<legend>Check all that apply</legend>

		<input type="submit" value="send" id="submit" name="submit">
		<input type="reset" value="clear" id="reset" name="reset">
	</form>
</body>
</html>