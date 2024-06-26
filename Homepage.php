<?php
    // Session
    session_start();

    if(isset($_POST['logout']) && $_POST['logout'] == 'logout') {
        $url = "Homepage.php";
        session_destroy();
        header("Location: " . $url);
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>FOODBANK HUB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="FBH-Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
<div>
    <div class="header">
        <a href="Homepage.php"><img class="logo" src="IMAGE/FBH-LOGO.png" alt="FOODBANK HUB LOGO"></a>
        <a href="Homepage.php"><h1>FOODBANK HUB</h1></a>
    </div>

    <div class="topnav">
        <a href="Homepage.php" class="active">Home</a>
        <a href="<?php echo isset($_SESSION['userloggedin']) ? "Foodbank-List.php" : "Account-Login.php"; ?>">Donate</a>
        <a href="Account-page.php"><?php echo isset($_SESSION['userloggedin']) ? "Logged in as " . $_SESSION['userloggedin'] : "Account"; ?></a>
        <a href="Admin-Page.php" class="active" style="float: right; <?php echo isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true ? "" : "display: none"; ?>"><i class="fa fa-unlock-alt" aria-hidden="true"></i> ADMIN</a>
    </div>
</div>

<center>
    <div class="content">
        <div class="card">
            <div class="image1">
                <img src="IMAGE/FBH-image1.jpg" alt="Table full of foods" style="width: 100%;">
                <div class="center-text">
                    <h1>TOGETHER WE MAKE A BETTER PLACE</h1><br>
                    <a href="<?php echo isset($_SESSION['userloggedin']) ? "Foodbank-List.php" : "Account-Login.php"; ?>"><button>DONATE TO US</button></a>
                    <a href="<?php echo isset($_SESSION['userloggedin']) ? "Foodbank-List.php" : "Account-Signup.php"; ?>"><button>JOIN US NOW</button></a>
                </div>
            </div>

            <div class="image1">
                <img src="IMAGE/FBH-image3.png" alt="Table full of foods" style="width: 100%;">
            </div>
        </div>
        <div class="card">
            <h3>Follow Us</h3>
            <center>
                <div class="follow-us-container">
                    <div class="follow-us">
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram" style="color:#d62976"></i></a>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f" style="color:#4267B2"></i></a>
                        <a href="https://twitter.com/i/flow/login"><i class="fab fa-twitter" style="color:#1DA1F2"></i></a>
                        <a href="https://www.youtube.com/"><i class="fab fa-youtube" style="color:#FF0000"></i></a>
                    </div>
                </div>
            </center>
        </div>
    </div>
</center>

</div>

<div class="footer">
    <a>Copyright <?php echo date('Y'); ?> FOOBBANK HUB</a>
</div>

</body>
</html>