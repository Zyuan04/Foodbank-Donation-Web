<!DOCTYPE html>
<html lang="en">
    <head>
        <title>FOOBANK HUB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    </head>

    <body>
        <div>
            <div class="header">
                <a href="Homepage.php"><img class="logo" src="IMAGE/FBH-LOGO.png" alt="FOODBANK HUB LOGO"></a>
                <a href="Homepage.php"><h1>FOODBANK HUB</h1></a>
            </div>

            <div class="topnav">
                <a href="Homepage.php">Home</a>
                <a href="Donate.php" class="active">Donate</a>
                <a href="Search.php">Search</a>
                <a href="Account-Login.php">Account</a>
                <a href=""></a>
            </div>
        </div> 

            <div id="search-container">
                <input type="search" id="search-input" placeholder="Search..." >  
                <button id="search">
                    <div style="text-align: center;"class="fa fa-search"></div>
                </button>
            </div>   
        </div>

        <div class="row">
            <div class="content">
                <div class="card">
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
                </div>
            </div>
        </div>
            <div class="footer">
                <a>Copyright © 2022 APPARELS.CO</a>
            </div>
    </body>
</html>

