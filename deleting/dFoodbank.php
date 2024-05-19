<?php
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

$sql="SELECT * FROM foodbank;";

$result = mysqli_query($conn, $sql);
?>
<form id="foodbank" name="foodbank" action="donation.php" method="POST">
<?php
if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row=mysqli_fetch_assoc($result)) {
   // print_r($row);
?>
   <p>Foodbank ID : <?php echo $row["foodbankID"]?><br>
   Foodbank Name : <?php echo $row["foodbankName"]?>
   <a href="Donation.php?id=<?php echo $row["foodbankID"]?>">Donate</a>
 <br><br> 
<?php
 }
 ?>
   <?php
} else {
 echo "0 results";
}
mysqli_close($conn);
?>
</form>

