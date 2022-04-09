<link rel="icon" type="image/x-icon" href="neo.jpg">
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin = true;
}
else{
  $loggedin=false;
}
/*
if($loggedin){
          $name = htmlspecialchars($_SESSION['username']);*/
          ?>
          <!DOCTYPE html>
<html>
<head>
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
<body>
    

<section data-bs-version="5.1" class="menu cid-s48OLK6784" once="menu" id="menu1-h">
 <?php   
 echo '
<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                        <img src="assets/images/sae-121x121.png" alt="Mobirise" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-7" href="index.php">KlevrBio</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
                ';
                if (!$loggedin){
                    echo '
                    <li class="nav-item">
                      <a class="nav-link link text-black display-4" href="login.php">Login</a></li>
                      <li class="nav-item">
                      <a class="nav-link link text-black display-4" href="signup.php">Sign Up</a></li>';
                }
                if ($loggedin){
                    
                    echo ' 
                    
                    <a class="nav-link link text-black display-4" href="index.php">Home</a></li>
                    <li class="nav-item">
                    <a class="nav-link link text-black display-4" href="account.php">Your Account</a></li>
                    
                    <li class="nav-item">
                    <a class="nav-link link text-black display-4" href="logout.php">Logout</a></li>
                    <li class="nav-item">
                      <a class="nav-link link text-black display-4" href="logs.php">ChangeLogs</a></li>
                    </ul>
                    
                    ';
                }
                   
                        
                        echo '     
                        </div>
                    </div>
                </nav>'   
                
           
?>
</section>

</body>

