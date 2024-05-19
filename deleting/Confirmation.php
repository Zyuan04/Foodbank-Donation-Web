<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql="SELECT * FROM donation ORDER BY donationID DESC LIMIT 1;";

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
   // Fetch the latest record as an associative array
   $latestRecord = $result->fetch_assoc();

   // Access the values of the latest record
   $donationID = $latestRecord['donationID'];
   $locationID = $latestRecord['locationID'];
   $locationName = $latestRecord['locationName'];
   $memberID = $latestRecord['memberID'];
   $memberName = $latestRecord['memberName'];
   $quantity = $latestRecord['quantity'];
   // ... and so on for other columns
}else {
   echo "0 results";
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
<h2>Confirmation</h2>
<p>Donation ID: <?php echo $donationID ?></p>
<p>Location ID: <?php echo $locationID ?></p>
<p>Location Name: <?php echo $locationName ?></p>
<p>Member ID: <?php echo $memberID ?></p>
<p>Member Name: <?php echo $memberName ?></p>
<p>Quantity: <?php echo $quantity ?></p>
<p>Total Price (RM): <?php echo $total ?></p>