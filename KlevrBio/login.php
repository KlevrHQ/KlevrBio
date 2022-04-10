<?php
$login = false;
$showError = false;
$fields_error = "Please fill all the required fields";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  include "partials/_dbconnect.php";
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  //$sql = "Select * from users where username='$username' AND password='$password'";
  $sql = "Select * from users where username='$username'";

  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1){
    while($row=mysqli_fetch_assoc($result)){

      if(password_verify($password, $row['password'])){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true; 
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $row['email'];
        $_SESSION['fname'] = $row['First Name'];
        $_SESSION['lname'] = $row['Last Name'];
        $_SESSION['date'] = $row['dt'];
        $_SESSION['biog'] = $row['bio'];
        $_SESSION['link'] = $row['link'];
        $_SESSION['link2'] = $row['link2'];
        $_SESSION['link3'] = $row['link3'];
        

        $_SESSION['img'] = $row['img'];
        $_SESSION['Languages'] = $row['Languages'];
        $_SESSION['skills'] = $row['skills'];
        header('location: index.php'); 
      }
      else{
        $showError = "Invalid Credentials ;-;-;";
        }
    }
    

  }
  
 
  else{
  $showError = "Invalid Credentials ;-;-;";
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
    <link rel="shortcut icon" href="assets/images/sae-121x121.png" type="image/x-icon">

    <title>Login</title>
  </head>
  <body>
  <?php require "partials/_nav.php"; ?>
  <?php

  if ($login){
  echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> You are logged in now :)
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

  <br>  
  
  <section data-bs-version="5.1" class="form7 cid-sVNwef7aNp" id="form7-o">
  <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
    Login 
</h3>
    
    <div class="container">
        <div class="mbr-section-head">
            
            
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="login.php" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name">
                    
                    <div class="dragArea row">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="name">
                            <input type="text" name="username" placeholder="Username" data-form-field="name" class="form-control" value="" id="username">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="email">
                            <input type="password" name="password" placeholder="password" data-form-field="password" class="form-control" value="" id="password">
                            <div id="passHel" class="form-text">Dont have an account? <a href="signup.php">Signup</a></div>
                          </div>
                       
                        <div class="col-auto mbr-section-btn align-center">
                            <button type="submit" class="btn btn-primary display-4">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
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