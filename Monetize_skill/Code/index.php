<?php require_once('header.php');?>

  <!-- ======= Hero Section ======= -->
  <!-- <section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">

 
      <br>
     
  </section>End Hero -->

  <?php
if (isset($_POST['post_submit']) && isset($_FILES['post'])) {
  // echo "<pre>";
  // print_r($_FILES['profile']);
  // echo "</pre>";
  $img_name = $_FILES['post']['name'];
  $img_size = $_FILES['post']['size'];
  $img_tmp_name = $_FILES['post']['tmp_name'];
  $img_error = $_FILES['post']['error'];
  $work_desc = $_POST['post_desc'];
  
  $target = "assets/img/post/" . basename($img_name);
  $sql8 = "INSERT INTO posts(user_id,post_image,post_description) VALUES ('{$userid}','{$img_name}','{$post_desc}')";
  if (!mysqli_query($conn, $sql8)) {
    $msg = "not inserted ";
  } else {
    // header("Location:$location/portfolio.php");
    move_uploaded_file($img_tmp_name, $target);

  }
  

}

?>

<!-- end work upload-->

<main id="main">

    <!-- ======= home Page Section ======= -->
    <br>
    <section id="about" class="about">
        <div class="container">
          <div class="row"></div>
            <div class="col-lg-1"></div>
            <div class="col-lg-8 profile-display">
              
            <div class="card-group">
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
          <?php
                    $sql="SELECT * FROM user,user_info where user.user_id = user_info.user_id";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                      while($row=mysqli_fetch_assoc($result)){
                        
                        ?>



                <!-- <div class="row profile-box">
                <div class="card" style="width: 18rem;">
                <?php echo "<img src='assets/img/profiles_images/".$row['profile_image']."' class='img-fluid' alt='' height='300' width='300''>";?>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div> -->
                     <!-- <div class="col-md-6">
                    <?php echo "<img src='assets/img/profiles_images/".$row['profile_image']."' class='img-fluid' alt='' height='300' width='300''>";?>
                     
                    </div>
                    <div class="col-md-6">
                        <form action="view_profile.php" method="get"> 
                    <ul>
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>">
                  <li><i class="data"></i> <strong>Name:</strong> <?php echo $row['firstname'];?>&nbsp;<?php echo $row['lastname'];?></li>
                  <li><i class="data"></i> <strong>Headline:</strong> <?php echo $row['headline'];?></li>
                  <li><i class="data"></i> <strong>Email:</strong> <?php echo $row['email'];?></li>
                </ul>
                    <a href="view_profile.php?uid=<?php echo $row['user_id'];?>" target="_self"> <input type="submit" name="btn" value="Info" > 
                    </a>
                        </form>
                       
                    </div>
                </div>-->
                <?php
                        }
                    }else{
                        echo "No Record found";
                    }
                ?>

            <div class="col-lg-3"></div>
            
            Filters

           </div> 

        </div> <!-- row closs-->
    </section><!-- End About Section -->

  

</main><!-- End #main -->


  <?php require_once('footer.php');?>