<!DOCTYPE html>
<html>
    <style>
        body{
            background-color: black;
        }

        table{
            border: 1px solid #303030;
            background-color: #303030;
            font-family: arial, sans-serif;
            border-collapse: separate;
            width: 85%;
            border-radius: 5px;
        }

        table.center{
            margin-top: 15%;
            margin-left: 8%;
            margin-right: 15%;
        }

        table.secondtbl{
            margin-top: 2%;
            margin-left: 8%;
            margin-right: 15%;
        }

        caption{
            color:#FFBF00;
            font-size: 25px;
        }

        th, td{
            text-align: center;
            padding: 8px;
        }

        th{
            color: #FFBF00;
            border-top: none;
        }

        td{
            color: whitesmoke;
        }

        td:first-child, th:first-child {
            border-left: none;
        }

        a{
            margin-right: 7px;
            color: blueviolet;
            text-decoration: none;
        }

        .button{
            background-color: #FFBF00;
            border: none;
            border-radius: 30px;
            color: black;
            padding: 8px 20px;
            text-align: center;
            text-decoration: none;
            float:right;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button:hover{
            background-color: #4CAF50;
        }

    </style>

    <table class="center">
        <caption><b>Foodbank Infomation</b></caption>
        <tr>
            <th>Foodbank ID</th>
            <th>Foodbank location</th>
            <th>Action</th>
        </tr>
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
<?php
if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row=mysqli_fetch_assoc($result)) {
   // print_r($row);
?>
   <tr>
    <th><?php echo $row["foodbankID"]?></th>
   <th><?php echo $row["foodbankName"]?></th>
   <th><a href="editFoodbank.php?id=<?php echo $row["foodbankID"]?>">Edit</a> 
   <a href="deleteFoodbank.php?id=<?php echo $row["foodbankID"]?>">Delete</a></th>
   </tr>
<?php
 }
 ?>
   <?php
} else {
 echo "0 results";
}
mysqli_close($conn);
?>
    </table>

    <table class="secondtbl">
        <caption><b>Donation information</b></caption>
        <tr>
            <th>Donation ID</th>
            <th>Foodbank ID</th>
            <th>Foodbank Name</th>
            <th>Member ID</th>
            <th>Member Name</th>
        </tr>
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

$sql="SELECT * FROM donation;";

$result = mysqli_query($conn, $sql);
?>
<?php
if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row=mysqli_fetch_assoc($result)) {
   // print_r($row);
?>
   <tr>
    <th><?php echo $row["donationID"]?></th>
   <th><?php echo $row["foodbankID"]?></th>
   <th><?php echo $row["foodbankName"]?></th>
   <th><?php echo $row["memberID"]?></th>
   <th><?php echo $row["memberName"]?></th>
   </tr>
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
        
    </table>
    <table class="secondtbl">
        <caption><b>Donate information</b></caption>
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
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

$sql = "SELECT * FROM donate;";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row=mysqli_fetch_assoc($result)) {
   // print_r($row);
?>
   <tr>
    <th><?php echo $row["itemID"]?></th>
   <th><?php echo $row["itemName"]?></th>
   <th><?php echo $row["description"]?></th>
   <th><?php echo $row["price"]?></th>
   <th><a href="editDonate.php?id=<?php echo $row["itemID"]?>">Edit</a> 
   <a href="deleteDonate.php?id=<?php echo $row["itemID"]?>">Delete</a></th>
   </tr>
<?php

 }
} else {
 echo "0 results";
}
mysqli_close($conn);
?>
    </table>
</html>