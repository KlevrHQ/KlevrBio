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
$link = $_SESSION['link'];
$link2 = $_SESSION['link2'];
$link3 = $_SESSION['link3'];

if (isset($_FILES['file'])){
    $file = $_FILES['file'];
    echo $file['name'];

    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    $file_ext = explode(".", $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($file_ext, $allowed)){
        if ($file_error === 0){
            if ($file_size <= 2097152){
                $file_name_new = $username.".".$file_ext;
                $file_destination = "files/".$file_name_new;
                
                if (move_uploaded_file($file_tmp, $file_destination)){
                    $img = mysqli_query($conn, "UPDATE `users` SET `img` = '$file_destination' WHERE `username` = '$username'");
                  
                    echo $file_destination;
                }
            }
        }

    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST['fname'];
  $lastname = $_POST['lname'];
  $bio = $_POST['bio'];
  $link = $_POST['link'];
  $link2 = $_POST['link2'];
  $link3 = $_POST['link3'];

// update account info
 
  $edit = mysqli_query($conn, "UPDATE `users` SET `First Name` = '$name', `Last Name` = '$lastname', `bio` = '$bio' , `link` = '$link', `link2` = '$link2', `link3` = '$link3' WHERE `username` = '$username'");
  if ($edit){
    $msg = "Successfully updated the profile";

    }
  else {
    $showError = "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.5.8, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.5.8, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/sae-121x121.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Edit Account</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  
</head>

<body>
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
  
<section data-bs-version="5.1" class="form7 cid-sVNwef7aNp" id="form7-o">
    
    
    <div class="container">
        <div class="mbr-section-head">
        <?php require "partials/_tabs.php" ?>

            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
              <br>
                <strong>Edit your account</strong></h3>
            
        </div>
                        
                    <div class="dragArea row">
                        <form action="edit.php" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">First Name</label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION['fname'] ?>" id="fname" name="fname" aria-describedby="emailHelp" required>
                                
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">Last Name</label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION['lname'] ?>" id="lname" name="lname" aria-describedby="emailHelp" required>
                                
                            </div>    
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">Bio</label>
                            <textarea class="form-control" id="body" name="bio" rows="10" placeholder="Enter your profile bio"><?php echo $data["bio"] ?></textarea>

                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">Link 1</label>
                                <input type="text" class="form-control" value="<?php echo $data['link'] ?>" id="link" name="link" required>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">Link 2</label>
                                <input type="text" class="form-control" value="<?php echo $data['link2'] ?>" id="link2" name="link2" required>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">Link 3</label>
                                <input type="text" class="form-control" value="<?php echo $data['link3'] ?>" id="link3" name="link3" required>
                              </div>
                            <strong>Upload Profile Icon</strong>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                            <input type="file" name="file" class="form-control" value="upload" id="file">
                            </div>
                            
                            <div class="col-auto mbr-section-btn align-center">
                            <button type="submit" class="btn btn-primary display-4" name="acc" id="acc" value="submit">Update</button>
                        </div>
                        
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

  
  
</body>
</html>