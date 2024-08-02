<?php
require('connection.inc.php');
session_start();
$username=$_SESSION["username"];
$userid=$_SESSION['userid'];    
$email=$_SESSION['email'];
if (!isset($_SESSION["username"])) {
  header("Location:{$location}/log_in.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- JS,css bootstrap and my css-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- fontawsom icons -->
  <link href="all.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/my_css.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Kelly - v4.7.0
  * Template URL: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo me-auto col-md-2"><a href="index.php">MonetizeSkill</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

       
    <div class="container-fluid col-md-7">
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  
    
      
      <div class="login_info">
      <?php
    
          $sql11 = "SELECT  profile_image from  user where user_id='{$userid}'";
          $result11 = mysqli_query($conn, $sql11);
          if(mysqli_num_rows($result11)>0){
            while($row11=mysqli_fetch_assoc($result11))
            {
              //  echo " <a href='about.php' ><img src='assets/img/profiles_images/".$row11['profile_image']."' class='user one'  alt='' width='50' height='50'> </a>";

              echo " <a href='about.php'><img src='assets/img/profiles_images/".$row11['profile_image']."' class='user one'  alt='Profile image' col-md-3> </a>";
               
            }
          }
          else{
            echo "<img src='assets/img/default.jpg' class='img-fluid' alt='' height='50' width='50'>";
          }
            // echo '<img src="assets/img/about.jpg" class="img-fluid" alt="">';
          ?>
     &nbsp;&nbsp;&nbsp;&nbsp;
      <!-- <a href="about.php"><?php echo $username;?></a> -->
&nbsp;&nbsp;

      <!-- <a href="about.php"><?php echo $userid;?></a> -->
      </div>

      <a href="logout.php" ><button type="button" class="btn btn-info">Logout</button></a>
    </div>
<!-- Createe a line -->
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last col-md-7">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <!-- <li><a href="services.html">Services</a></li> -->
          <li><a href="portfolio.php">Work</a></li>
          <li><a href="resume.php">ME</a></li>
          <!-- <li><a href="contact.php">Contact</a></li> -->
          <!-- <li><a href="home.php">Start Page</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links  col-md-3">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> 
      </div>
      
      
      <!-- <a href="logout.php" ><button type="button" class="btn btn-info">Logout</button></a> -->
    </div>
    </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
 

  <!-- <img src="Images/sc1.jpg" alt="Logo" height="300" width="300"> -->
 


