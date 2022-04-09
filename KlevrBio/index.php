<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin = true;
  }
  else{
    $loggedin=false;
  }
include "partials/_vars.php";
include "partials/_dbconnect.php";
/* if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
} */
$name = htmlspecialchars($_SESSION['username']);
// $url = "http://".$_SERVER['HTTP_HOST'].$_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM `users` where `username` = '$name'"); 
// grab first name
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html  >
<head>
<meta charset="utf-8">
   
    <!-- Site made with Mobirise Website Builder v5.5.8, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.5.8, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/sae-121x121.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Home</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/parallax/jarallax.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  
</head>
<body >
<?php require "partials/_nav.php"; ?>

<section data-bs-version="5.1" class="header1 cid-s48MCQYojq mbr-fullscreen mbr-parallax-background" id="header1-f" >

    

    <div class="mbr-overlay" 
    style="background-image: url('bk1.jpg'); 
background-size: 95% 95%;
background-size: cover;"></div>

    <div class="align-center container" >
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 text-white">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-1 text-white">Hey There!</h1>
                <br>
                <br>
                <br>
                <?php
                if (!$loggedin) {
                echo '<h4 class="mbr-section-title mbr-fonts-style align-center mb-5">Create amazing and effective developer portfolios with just a few clicks, <br> and share it with the world!</h4>
                  ';
                    echo '<a class="btn btn-primary display-4" href="signup.php">Get started for Free!</a>';
                    echo '<br>';
                    echo '<p>Already have an account? <a href="login.php">Login</a> </p>';
                }
                else{
                  echo '<h4 class="mbr-section-title mbr-fonts-style align-center mb-5">Welcome Back '; echo $row["First Name"]; echo '! </h4>
                  ';
                    echo '<a class="btn btn-primary display-4" href="account.php">DashBoard</a>';
                    echo '<a class="btn btn-danger display-4" href="logout.php">Logout</a>';
                    echo '<a class="btn btn-success display-4" href="post.php?username='; echo $name; echo '">View Your Portfolio</a>';

                }
                ?>
                
            </div>
        </div>
    </div>
</section>






<section data-bs-version="5.1" class="image3 cid-s48upRUlSD" id="image3-9">
    

    

    
</section>




<?php 
    include "partials/_footer.php"
    ?>
</body>
</html>
