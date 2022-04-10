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
        <div>
            <div class="col-12">
                <h3 class="mbr-section-title mbr-fonts-style mb-4 display-2">
                    <strong>Account Dashboard</strong>
                </h3>
                
            </div>

            
            <div class="col-sm-6 col-lg-4">
                <div class="card-wrap">
                    <!--<div class="image-wrap">
                        <img src=<?php echo $row["img"] ?>>
                    </div>-->
                        <script>
                            function myFunction() {
                            /* Get the text field */
                            var copyText = "http://klevrbio.rf.gd/post.php?username=" + <?php echo $row["username"] ?>;

                            /* Select the text field */
                            copyText.select();
                            copyText.setSelectionRange(0, 99999); /* For mobile devices */

                            /* Copy the text inside the text field */
                            navigator.clipboard.writeText(copyText.value);
                            document.getElementById("clip").style.visibility = "none";
                            }
                           
                            /* Alert the copied text */
                            

                        </script>
                        <h3><b>Username: </b> <?php echo $row["username"] ?></h3>
                        <br>    
                        <h3><b>Name: </b> <?php echo $row["First Name"] . ' ' . $row["Last Name"]?></h3>
                        <br>
                        <h3><b>Email: </b> <?php echo $row["email"] ?></h3>
                        <br>    
                        <h3><b>Date Joined: </b> <?php echo $row['dt'] ?></h3>
                        <br>
                        
                        <a href="edit.php" class="btn btn-primary">Edit Portfolio</a>
                        
                        <a href="post.php?username=<?php echo $username?>" class="btn btn-warning">View your Portfolio</a>
                        <br>    
                        <!--
                        <button class="btn btn-danger" onclick="Function()" >Share your Portfolio!</button>
                        <br>
                        <p style="visibility: hidden;" id="clip">Copied to clipboard!</p>-->
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</section>

</body>
</html>