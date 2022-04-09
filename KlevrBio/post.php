<?php
session_start();
include "partials/_vars.php";
include "partials/_dbconnect.php";
$result = mysqli_query($conn, "SELECT * FROM users");
$posts = mysqli_query($conn, "SELECT * FROM posts");

$username = $_GET['username'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.5.8, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/sae-121x121.png" type="image/x-icon">
  <meta name="description" content="">
  
  <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet" type="text/css"/>

  <title><?php $username ?></title>
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
  
  
    <!-- Required meta tags -->
   

    

  </head>
  
  <body style="background-image: url('https://media.discordapp.net/attachments/825249708225462312/961286975166496798/bk1.jpg'); 
background-size: 95% 95%;
background-size: cover;">
  <br>  
      

        <?php $result = mysqli_query($conn, "SELECT * FROM `users` where `username` = '$username'"); 

        $title = mysqli_query($conn, "SELECT * FROM `posts` where `title`"); 
        $text = mysqli_query($conn, "SELECT * FROM `posts` where `text`"); 
        $date = mysqli_query($conn, "SELECT * FROM `posts` where `date`");
        $post_username = mysqli_query($conn, "SELECT * FROM `posts` where `username`");
        $img = mysqli_query($conn, "SELECT * FROM `users` where `img`");

        $row = mysqli_fetch_array($result);
        
        
            

?>
<section data-bs-version="5.1" class="team1 cid-sVOG0AriLQ" id="team1-r" style="background-image: url('https://media.discordapp.net/attachments/825249708225462312/961286975166496798/bk1.jpg?width=797&height=495'); 
background-size: 95% 95%;
background-size: cover;">



    
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-12">
                
                
            </div>
            

            
            <div class="col-sm-6 col-lg-4">
                <div class="card-wrap">
                    <center>
                    <div class="image-wrap">
                        <img src=<?php echo $row["img"]?>>
                    </div>
                    </center>
                    <div class="content-wrap">
                        <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                            <strong ><?php echo $row["First Name"]." ".$row["Last Name"] ?></strong>
                        </h5>

  

                        
                        <p class="card-text mbr-fonts-style align-center display-7">
                        <?php echo $row['bio'] ?>
                        </p>
                        <?php 
                        function get_domain($url)
                        {
                          $pieces = parse_url($url);
                          $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
                          if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
                            return $regs['domain'];
                          }
                          return false;
                        }
                        
                         // outputs 'somedomain.co.uk'
                        $url = get_domain($row['link']);
                        $url2 = get_domain($row['link2']);
                        $url3 = get_domain($row['link3']);
                        
                        ?>
                        

<center>
                        <a href="<?php echo $row['link']?>" class="btn btn-primary"><?php echo $url ?></a>
                        <a href="<?php echo $row['link2']?>" class="btn btn-danger"><?php echo $url2 ?></a>
                        <a href="<?php echo $row['link3']?>" class="btn btn-dark"><?php echo $url3 ?></a>
                        </center>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</section>
<br>

  </body>
</html>