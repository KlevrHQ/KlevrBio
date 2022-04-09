<?php
session_start();
include "partials/_vars.php";
include "partials/_dbconnect.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
$users = mysqli_query($conn, "SELECT * FROM users");
$row = mysqli_fetch_assoc($users);
$name = htmlspecialchars($_SESSION['username']);
$email = htmlspecialchars($_SESSION['email']);
$username = htmlspecialchars($_SESSION['username']);
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$dat = $_SESSION['date'];
$bio = $_SESSION['biog'];
$img = $_SESSION['img'];
$result = mysqli_query($conn, "SELECT * FROM `users` where `username` = '$username'");
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.5.8, https://mobirise.com -->
  
</head>
<body>
<?php require "partials/_nav.php"; ?>
<div class="container">
    <br>
    <br>
<?php require "partials/_tabs.php" ?>
</div>
<section data-bs-version="5.1" class="team1 cid-sVOG0AriLQ" id="team1-r">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                    <strong>Your Profile</strong>
                </h3>
                
            </div>

            
            <div class="col-sm-6 col-lg-4">
                <div class="card-wrap">
                    <div class="image-wrap">
                        <img src=<?php echo $row["img"] ?>>
                    </div>
                    <div class="content-wrap">
                        <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                            <strong><?php echo $row["First Name"]." ".$row["Last Name"] ?></strong>
                        </h5>
                        <h6 class="mbr-role mbr-fonts-style align-center mb-3 display-4">
                            <strong>@<?php echo $name ?></strong>
                        </h6>
                        <h6 class="mbr-role mbr-fonts-style align-center mb-3 display-4">
                            <strong><?php echo $email ?></strong>
                        </h6>
                        <p class="card-text mbr-fonts-style align-center display-7">
                        <?php echo $row["bio"] ?>
                        </p>
                        
                        
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</section>

</body>
</html>