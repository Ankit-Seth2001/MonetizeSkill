<?php

$userid=$_GET['user_id'];
echo $userid;
$conn=mysqli_connect("localhost","root","","monetizeskill");
$location="http://localhost/Monetize_skill/Code";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Resume - Kelly Bootstrap Template</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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

      <h1 class="logo me-auto me-lg-0"><a href="home.php">MonetizeSkill</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <!-- <li><a>Resume</a></li>        -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!-- <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div> -->

    </div>

  </header><!-- End Header -->

  <main id="main">

  <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Resume</h2>
        <?php $query="Select profile_image from user where user_id='{$userid}'";
         $result=mysqli_query($conn,$query);
         while($row=mysqli_fetch_assoc($result))
         {echo "<img src='assets/img/profiles_images/".$row['profile_image']."' class='img-fluid' alt='' height='500' width='500'>";}
        ?>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <h3 class="resume-title">Basic Details</h3>
            <?php
              $sql1="SELECT * From user_info where user_id='{$userid}'";
              $result1=mysqli_query($conn,$sql1);
              $sql2="SELECT * from user  where user_id='{$userid}'";
              $result2=mysqli_query($conn,$sql2);
              while($row2=mysqli_fetch_assoc($result2)){$email=$row2['email'];}
              if(mysqli_num_rows($result1)>0){
                  while($row1=mysqli_fetch_assoc($result1)){

                  
            ?>
            <div class="resume-item pb-0">
              <h4><?php echo $row1['firstname'];?>&nbsp;<?php echo $row1['lastname'];?></h4>
              <p><em> <?php echo $row1['headline'];?></em></p>
            
              <ul>
               
                <li><?php echo $row1['city'];?> ,<?php echo $row1['state'];?></li>
                <li>Age : <?php echo $row1['age'];?></li>
                <li>Birth Date : <?php echo $row1['dob'];?></li>
                <li>Mobile : <?php echo $row1['phone'];?></li>
                <li>Email : <?php echo $email;?></li>
              </ul>
              </p>
            </div>
            <?php
            }
          }else{
            echo "Not mentioned";
           
              }?>

            <h3 class="resume-title">Education</h3>
            
            <?php
              $sql3="SELECT * From educational where user_id='{$userid}'";
              $result3=mysqli_query($conn,$sql3);
             
              if(mysqli_num_rows($result3)>0){
                  while($row3=mysqli_fetch_assoc($result3)){     
            ?>
            <div class="resume-item pb-0">
              <h4> <?php echo $row3['university'];?></h4>
              <p><em> <?php echo $row3['description'];?></em></p>
            
              <ul>
                
                <li> Degree : <?php echo $row3['degree'];?></li>
                <li> Field of study : <?php echo $row3['field_of_study'];?></li>
                <li> Start: <?php echo $row3['start'];?></li>
                <li> End  : <?php echo $row3['end'];?></li>
                <li>Activities  : <?php echo $row3['activities'];?></li>
              </ul>
              </p>
            </div>
            <?php
            }
          }else{
            echo "Not mentioned";
              }?>
            <!-- <div class="resume-item">
              <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
              <h5>2010 - 2014</h5>
              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
              <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
            </div> -->
          </div>
          <div class="col-lg-6">
            <h3 class="resume-title">Professional Experience</h3>
            <?php
              $sql4="SELECT * From current_details where user_id='{$userid}'";
              $result4=mysqli_query($conn,$sql4);
             
              if(mysqli_num_rows($result4)>0){
                  while($row4=mysqli_fetch_assoc($result4)){

          
            ?>
            <div class="resume-item">
              <h4><?php echo $row4['title'];?></h4>
              <h5><?php echo $row4['company'];?></h5>
              <p><em><?php echo $row4['state'];?> , <?php echo $row4['city'];?></em></p>
              <p>
              <ul>
                <li><?php echo $row4['employee_type'];?> Job</li>
                <li><em><?php echo $row4['description'];?> </em></li>
                <!-- <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
                <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li> -->
              </ul>
              </p>
            </div>
            <?php }}else{
           echo "Not mentioned";
            }?>
          
          </div>
        </div>

        <a href="index.php"><button type="button" class="btn btn-primary">Back</button></a>
      </div>
    </section><!-- End Resume Section -->
  </main><!-- End #main -->

  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MonetizeSkill</span></strong>. All Rights Reserved
      </div>
     
    </div>
  </footer>
  <!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>