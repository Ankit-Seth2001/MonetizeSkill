<?php
require('connection.inc.php');
error_reporting(0);
if (isset($_POST['submit'])) {
  
  // $email = strtolower($_POST['email']);
  $pass = strtolower($_POST['pwd']);
  $uname = strtolower($_POST['uname']);
  $sql="Select * from user where username='{$uname}' and pass='{$pass}'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)==1){
    session_start();
    $sql1="SELECT * from user where username='{$uname}'";
    $result1=mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_assoc($result1))
    {
     $uname=$row['username'];
     $userid=$row['user_id'];
     $email=$row['email'];
    }
    $_SESSION['username']=$uname;  
    $_SESSION['userid']=$userid;
    $_SESSION['email']=$email;
    header("Location:$location/index.php");
  }
  else{
    $err="Invalid login Details";
  }
     
     
  
    // if(empty($email)){
    //   $err="Please Enter email";
    // }
    // else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    // {
    //   $err="Invalid Email...";
    // }
    // else{
    //     session_start();
    //     $_SESSION['username']=$uname;  
         
    // header("Location:$location/index.php");
    // }
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

  <style> .field_error {
      color: red;
      margin-top: 15x;
      font-size: 20px;
    }</style>
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
      <h1 class="logo me-auto me-lg-0"><a href="log_in.php">MonetizeSkill</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
       <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
    </div>
    
    </header>
    <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <!-- <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100"> -->
    <div class="container">

    <form action="<?php $_SERVER['PHP_SELF']; ?>" name="signup" id="signup" method="post">
      <!-- <h4 id="log">Login</h4> -->
      <div class="form-group">
        <label for="username">Username</label><br>
        <input type="text" class="form-control" placeholder="Enter Email " name="uname" id="uname" required>
        <!-- <span id="text"></span> -->
      </div><br>
    
      <div class="form-group">
        <label for="pwd">Password</label><br>
        <input type="password" class="form-control" placeholder="Enter password" name="pwd" id="pwd" required>
      </div><br>

      <button type="submit" class="btn btn-primary" name="submit" value="Submit">Login</button>
      &nbsp;&nbsp;&nbsp;

      <button type="submit" id="signup" class="btn btn-primary" name="submit" value="Submit"> <a href="sign_up.php">Signup</a></button>
     
      <div class="field_error"><?php echo $err; ?></div>
    </form>
      <br>
      <!-- <img src="Images/Logo.png" alt="Logo" height="300" width="300"> -->
  </section><!-- End Hero -->


  <?php require_once('footer.php');?>