<?php
session_start();
include "partials/_vars.php";
include "partials/_dbconnect.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
$msg = false;
$showError = false;
$username = $_SESSION['username'];
$qry = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username'");
$data = mysqli_fetch_array($qry);
$username = $_SESSION['username'];
$bio = $_SESSION['biog'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST['fname'];
  $lastname = $_POST['lname'];
  $bio = $_POST['bio'];
// update account info
 
  $edit = mysqli_query($conn, "UPDATE `users` SET `First Name` = '$name', `Last Name` = '$lastname', `bio` = '$bio' WHERE `username` = '$username'");
  if ($edit){
    $msg = "Successfully updated the profile";

    }
  else {
    $showError = "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Account</title>
  </head>
  <body class="bg-dark">
  <?php require "partials/_nav.php"; ?>
 <?php
if ($msg){
  echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> Account updated!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong> '.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

?>
  
  
  
  
  ?>

  <br>  
  <div class="container text-white">
      <img src="ded.gif" alt="">
    <br>
    <h1 class="">Edit your account</h1>
    <br>  
    
    <form action="edit.php" method="post" class="w-75">
 
  
  
  <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">First Name</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['fname'] ?>" id="fname" name="fname" aria-describedby="emailHelp" required>
    
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">Last Name</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['lname'] ?>" id="lname" name="lname" aria-describedby="emailHelp" required>
    
  </div>    
  <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">Bio</label>
  <textarea class="form-control" id="body" name="bio" rows="10" placeholder="Enter your profile bio"><?php echo $data["bio"] ?></textarea>

  </div>
  
  
  <div class="col-auto mbr-section-btn align-center">
                            <button type="submit" class="btn btn-primary display-4" name="acc" id="acc">Update</button>
                        </div>
</form>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <?php 
    include "partials/_footer.php"
    ?>
  </body>
</html>