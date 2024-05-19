<?php
$key="";
if(isset($_POST['submit'])&& $_POST['submit']=="Go"){
   $key=$_POST['search'];
}
?>

<form name="fSearch" id="fSearch" action="Foodbank.php" method="POST">
Search: <input type="text" name="search" value="<?php echo $key;?>">
<input type="submit" name="submit" value="Go">
</form>

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

if($key==""){
   $sql = "SELECT * FROM foodbank;";
}
else{
   $sql="select * FROM foodbank WHERE foodbankID LIKE '%$key%' OR foodbankName LIKE '%$key%';";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row=mysqli_fetch_assoc($result)) {
   // print_r($row);
?>
   <p> 
   Foodbank ID: <?php echo $row["foodbankID"]?> <br>
   Foodbank Name: <?php echo $row["foodbankName"]?> <br>
   Action: <a href="editFoodbank.php?id=<?php echo $row["foodbankID"]?>">Edit</a> 
   <a href="deleteFoodbank.php?id=<?php echo $row["foodbankID"]?>">Delete</a> <br>
<?php
 }
} else {
 echo "0 results";
}
mysqli_close($conn);
?>

