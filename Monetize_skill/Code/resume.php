<?php require_once('header.php');?>
  <main id="main">

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Profile</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
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
            echo '<br><a href="about.php" >Upload Basic details...</a>';
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
            echo '<br><a href="about.php" >Upload Professional details...</a>';
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
                echo '<br><a href="about.php" >Upload Professional details...</a>';
            }?>
            <!-- <div class="resume-item">
              <h4>Graphic design specialist</h4>
              <h5>2017 - 2018</h5>
              <p><em>Stepping Stone Advertising, New York, NY</em></p>
              <p>
              <ul>
                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
              </ul>
              </p>
            </div> -->
            <!-- <div class="resume-item">
              <h4>Graphic design specialist</h4>
              <h5>2017 - 2018</h5>
              <p><em>Stepping Stone Advertising, New York, NY</em></p>
              <p>
              <ul>
                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
              </ul>
              </p>
            </div> -->
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

  </main><!-- End #main -->
  <?php require_once('footer.php');?>