<?php
session_start();
include "partials/_vars.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}

?>

<style>
    .inline-block-child {
  display: inline-block;
  flex: 10;
    }

  .flex-parent {
      display: flex;
        }
    
    .flex-child {
        flex: 5;
    }
    .vl {
  border-left: 0.5px solid grey;
  height: 500px;
}

</style>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Logs - KlevrHub</title>
  </head>
  <body>
  <?php require "partials/_nav.php"; ?>
  <br>  
  <br>
  <section data-bs-version="5.1" class="content15 cid-sVNkqXfiNw" id="content15-l">

    

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12 col-lg-10">
            <h1>Developer Logs</h1>
            <div class="card-wrapper">
                    <div class="card-box align-left">
                        <h4 class="card-title mbr-fonts-style mbr-white mb-3 display-5">
                            <strong>09/04/22</strong></h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                          Updated some more stuff:
                          <br>
                          -> Added an account dashboard
                          <br>
                          -> Tweaked some minor stuff in site UI
                          <br>
                          <b>-> Added a new Languages field to the Portfolio</b>
                          <br>
                          
                        </p>
                        
                    </div>
                </div>
                <br>
            <div class="card-wrapper">
                    <div class="card-box align-left">
                        <h4 class="card-title mbr-fonts-style mbr-white mb-3 display-5">
                            <strong>07/04/22</strong></h4>
                        <p class="mbr-text mbr-fonts-style display-7">Pushed minor tweaks
                          <br>
                          -> Updated Homepage <br>
                          -> Menu elements can be accessed from HomePage also <br>
                          -> Collapsing menu not working on phone browsers (glitch) <br>
                          -> Fixed signup page link glitch on login page <br>
                          -> Added a new tab for the developer logs <br>
                          <br>
                        </p>
                        
                    </div>
                </div>
                <br>
            <br>
                <div class="card-wrapper">
                    <div class="card-box align-left">
                        <h4 class="card-title mbr-fonts-style mbr-white mb-3 display-5">
                            <strong>06/04/22</strong></h4>
                        <p class="mbr-text mbr-fonts-style display-7">Initial version released</p>
                        
                    </div>
                </div>
                <br>
                

<br>

                
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