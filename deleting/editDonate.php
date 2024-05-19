<?php
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

$sql = "SELECT * FROM donate WHERE itemID=$itemID;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	$itemID=$row["itemID"]; 
	$itemName=$row["itemName"];
	$description=$row["description"];
	$price=$row["price"];
  }
} 
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head><title>Web Form - POST/GET</title></head>
<body>
	<form id="donate" name="donate" action="editdonate1a.php" method="POST">
	
		<label for="itemID">Item ID</label>
		<input type="text" id="itemID" name="itemID" maxlength="10" readonly value="<?php echo $itemID?>"><br>

		<label for="name">Item Name</label>
		<input type="text" id="itemName" 
		name="itemName" maxlength="30" placeholder="" value="<?php echo $itemName?>"><br>
		
		<label for="description">Description: </label><br>
		<textarea rows="3" cols="20" id="description" name="description"><?php echo $description?>
		</textarea><br>
		
        Price (RM)
		<input type="int" id="price" 
		name="price" placeholder="" value="<?php echo $price?>"><br>
		
		<fieldset>
		<legend>Check all that apply</legend>

		<input type="submit" value="send" id="submit" name="submit">
		<input type="reset" value="clear" id="reset" name="reset">
	</form>
</body>
</html>