<?php require_once('header.php'); ?>

<!-- basic detials start -->
<?php
if (isset($_POST['basic_save'])) {
  // $msg="Button clicked";
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $headline = $_POST['headline'];
  $sql = "INSERT INTO  user_info(user_id,firstname,lastname,age,dob,phone,city,state,headline) VALUES
    ('{$userid}','{$firstname}','{$lastname}','{$age}','{$dob}','{$phone}','{$city}','{$state}','{$headline}')";
  if (!mysqli_query($conn, $sql)) {
    $msg = "Can not insert";
  } else {
    $msg = "inserted successfully";

    $sql = "SELECT uinfo_id from user_info where user_id='{$userid}'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $key = $row['uinfo_id'];
    }
    echo $key;
    $sql = "UPDATE user set uinfo_id ='{$key}' where user_id='{$userid}'";
    if (!mysqli_query($conn, $sql)) {
      $msg = "Can not insert key";
    } else {
      $msg = " key inserted successfully ";
    }
  }
}

if (isset($_POST['basic_edit'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $phone =$_POST['phone'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $headline = $_POST['headline'];

  $sql3 = "UPDATE user_info set firstname='{$firstname}',lastname='{$lastname}',age='{$age}',dob='{$dob}',
  phone='{$phone}',city='{$city}',state='{$state}',headline='{$headline}' where user_id='{$userid}'";
  if (!mysqli_query($conn, $sql3)) {
    $msg = "Can not update";
  } else {
    $msg = "Updated";
  }
}

?>
<!-- basic details end -->

<!-- current details -->
<?php
if (isset($_POST['curr_save'])) {

  $title = $_POST['title'];
  $employee_type = $_POST['employee_type'];
  $city = $_POST['city'];
  $desc = $_POST['desc'];
  $company =$_POST['company'];
  $state =$_POST['state'];
  $sql4 = "INSERT INTO  current_details(user_id,title,employee_type,company,state,city,description) VALUES
    ('{$userid}','{$title}','{$employee_type}','{$company}','{$state}','{$city}','{$desc}')";
  if (!mysqli_query($conn, $sql4)) {
    $msg = "Can not insert";
  } else {
    $msg = "inserted successfully";
  }


  // $sql="SELECT curr_id from current_detials where user_id='{$userid}'";
  // $result=mysqli_query($conn,$sql);
  // while($row=mysqli_fetch_assoc($result)){$key=$row['curr_id'];}
  // echo $key;
  // $sql="UPDATE current_details set curr_id ='{$key}' where user_id='{$userid}'";
  // if (!mysqli_query($conn, $sql)) {
  //   $msg = "Can not insert key";
  // } else {
  //   $msg = " key inserted successfully ";
  // }

}

if (isset($_POST['current_edit'])) {
  $title = $_POST['title'];
  $employee_type = $_POST['employee_type'];
  $company = $_POST['company'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $description = $_POST['desc'];

  $sql3 = "UPDATE current_details set title='{$title}',employee_type='{$employee_type}',company='{$company}',state='{$state}', city='{$city}',description='{$description}' where user_id='{$userid}'";
  if (!mysqli_query($conn, $sql3)) {
    $msg = "Can not update";
  } else {
    $msg = "Updated";
  }
}


?>

<!-- end current details-->

<!-- educational details -->
<?php
if (isset($_POST['edu_save'])) {
  $university = $_POST['university'];
  $degree = $_POST['degree'];
  $fstudy = $_POST['fstudy'];
  $start = $_POST['start'];
  $end = $_POST['end'];
  $activities = $_POST['activities'];
  $description = $_POST['description'];

  $sql6 = "INSERT INTO  educational(user_id,university,degree,field_of_study,start,end,activities,description) VALUES
    ('{$userid}','{$university}','{$degree}','{$fstudy}','{$start}','{$end}','{$activities}','{$description}')";
  if (!mysqli_query($conn, $sql6)) {
    $msg = "Can not insert";
  } else {
    $msg = "inserted successfully";
  }


  // $sql="SELECT edu_id from educational where user_id='{$userid}'";
  // $result=mysqli_query($conn,$sql);
  // while($row=mysqli_fetch_assoc($result)){$key=$row['ecu_id'];}
  // echo $key;
  // $sql="UPDATE user set edu_id ='{$key}' where user_id='{$userid}'";
  // if (!mysqli_query($conn, $sql)) {
  //   $msg = "Can not insert key";
  // } else {
  //   $msg = " key inserted successfully ";
  // }
}
if (isset($_POST['edu_edit'])) {
  $university = $_POST['university'];
  $degree = $_POST['degree'];
  $fstudy = $_POST['fstudy'];
  $start = $_POST['start'];
  $end = $_POST['end'];
  $activities = $_POST['activities'];
  $description = $_POST['description'];
  $sql7 = "UPDATE educational set university='{$university}',degree='{$degree}',field_of_study='{$fstudy}',start='{$start}',end='{$end}',activities='{$activities}',description='{$description}'
  where user_id='{$userid}'";
  if (!mysqli_query($conn, $sql7)) {
    $msg = "Udated";
  } else {
    $msg = "Not updated";
  }
}

?>
<!-- end educatiobal detilas -->

<!--  start upload work -->

<?php
if (isset($_POST['sub_work']) && isset($_FILES['profile'])) {
  // echo "<pre>";
  // print_r($_FILES['profile']);
  // echo "</pre>";
  $img_name = $_FILES['profile']['name'];
  $img_size = $_FILES['profile']['size'];
  $img_tmp_name = $_FILES['profile']['tmp_name'];
  $img_error = $_FILES['profile']['error'];
  $work_desc = $_POST['work_desc'];
  $link = $_POST['link'];
  $price=$_POST['price'];
  $target = "assets/img/portfolio/" . basename($img_name);
  $sql8 = "INSERT INTO work_images(user_id,img_name,img_desc,link,price) VALUES ('{$userid}','{$img_name}','{$work_desc}','{$link}','{$price}')";
  if (!mysqli_query($conn, $sql8)) {
    $msg = "not inserted ";
  } else {
    header("Location:$location/portfolio.php");
  }
  move_uploaded_file($img_tmp_name, $target);
}

?>

<!-- end work upload-->

<!-- start profile upload -->
<?php
if (isset($_POST['sub_profile'])) {
  // echo '<script>alert("Hi")</script>';
  $img_name = $_FILES['profile']['name'];
  $img_size = $_FILES['profile']['size'];
  $img_tmp_name = $_FILES['profile']['tmp_name'];
  $img_error = $_FILES['profile']['error'];
  $extension = pathinfo($img_name, PATHINFO_EXTENSION);
  $target = "assets/img/profiles_images/" . basename($img_name);
  $valid_extensions = array("png", "jpg", "jpeg");
  $sql10 = "SELECT * from  user where user_id='{$userid}'";
  $result10 = mysqli_query($conn, $sql10);
  if (mysqli_num_rows($result10) == 0) // update profile image
  {
    if (in_array($extension, $valid_extensions)) {
      move_uploaded_file($img_tmp_name, $target);
      $sql9 =  "UPDATE user SET profile_image='{$img_name}' where user_id='{$userid}'";
      if (!mysqli_query($conn, $sql9)) {
        $msg = "not inserted ";
      } else {
        $msg = " inserted ";
        // header("Location:$location/portfolio.php");
      }
    } else {
      $msg = "Allowed jpg,png,jpeg ";
    }
  } else if (mysqli_num_rows($result10) == 1) {
    if (in_array($extension, $valid_extensions)) {
      move_uploaded_file($img_tmp_name, $target);
      $sql9 = "UPDATE user SET profile_image='{$img_name}' where user_id='{$userid}'";
      if (!mysqli_query($conn, $sql9)) {
        $msg = "Not updated ";
      } else {
        $msg = " Updated ";
        // header("Location:$location/portfolio.php");
      }
    } else {
      $msg = "Allowed jpg,png,jpeg ";
    }
    // if (in_array($extension, $valid_extensions)) {
    //   move_uploaded_file($img_tmp_name, $target);
    // $sql11="UPDATE profile_photo set pro_name='{$img_name}'";
    // mysqli_query($conn,$sql11) or die("Can not update");
    // }
    $sql = "SELECT pro_id from profile_photo where user_id='{$userid}'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $key = $row['pro_id'];
    }
    echo $key;
    $sql = "UPDATE user set pro_id ='{$key}' where user_id='{$userid}'";
    if (!mysqli_query($conn, $sql)) {
      $msg = "Can not insert key";
    } else {
      $msg = " key inserted successfully ";
    }
  }
}
?>

<!-- profile upload end -->
<main id="main">
  <!-- Start Basic Details -->
  <section id="about" class="about">
    <!-- <p><?php
        if (isset($_POST['basic_save'])) {
          echo $msg;
        }
        if (isset($_POST['curr_save'])) {
          echo $msg;
        }
        if (isset($_POST['edu_save'])) {
          echo $msg;
        }
        if (isset($_POST['sub_work'])) {
          echo $msg;
        }
        if (isset($_POST['sub_profile'])) {
          echo $msg;
        }
        if (isset($_POST['curr_edit'])) {
          echo $msg;
        }
        ?></p> -->
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About</h2>
        <!-- <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. At, voluptas!
           
            <i class="fa-solid fa-pen"></i>
          </p> -->
      </div>

      <div class="row">
        <div class="col-lg-4 " id="disp_pro">
          <?php
          $sql11 = "SELECT profile_image from  user where user_id='{$userid}'";
          $result11 = mysqli_query($conn, $sql11);
          if (mysqli_num_rows($result11) > 0) {
            while ($row11 = mysqli_fetch_assoc($result11)) {
              echo "<img src='assets/img/profiles_images/" . $row11['profile_image'] . "' class='img-fluid' alt='' height='500' width='500'>";
            }
          } else {
            echo "<img src='assets/img/default.jpg' alt='profile image'>";
          }
          // echo '<img src="assets/img/about.jpg" class="img-fluid" alt="">';
          ?>

          <div class="display">

          </div>
          <!-- <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, ipsam!</P> -->
        </div>
        <form name="pro_img" id="pro_img" method="post" enctype="multipart/form-data">
          <input type="file" name="profile" id="profile">
          <input type="submit" name="sub_profile" value=" Save">
        </form>
        <div class="col-lg-8 pt-4 pt-lg-0 content">
          <!-- <h3>Illustrator &amp; UI/UX Designer</h3> -->
          <h3>Basic Details</h3>
          <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <div class="row">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" name="Basic details" id="bd" method="post">
              <table cellpadding="10" cellspacing="25">
                <tr>
                  <th><strong>First Name</strong></th>
                  <th><strong>Last Name:</strong></th>
                  <th><strong>Date of birth:</strong></th>
                </tr>
                <tr>
                  <td><input type="text" name="firstname" id="firstname" required></td>
                  <td><input type="text" name="lastname" id="lastname" required></td>
                  <td> <input type="date" name="dob" id="dob" required></td>
                </tr>

                <tr>
                  <th><strong>Phone:</strong></th>
                  <th><strong>Age:</strong></th>
                  <th><strong>State:</strong></th>
                </tr>
                <tr>
                  <td> <input type="text" name="phone" id="phone"  size="10" required></td>
                  <td><input type="text" name="age" id="age" required></td>
                  <td><input type="text" name="state" id="state" required></td>
                </tr>

                <tr>
                  <th><strong>City:</strong></th>
                  <th><strong>Headline:</strong></th>

                </tr>
                <tr>
                  <td> <input type="text" name="city" id="city" required></td>
                  <td> <textarea rows="5" cols="20" placeholder="This text will be displayed below your name " name="headline" required></textarea></td>

                </tr>
                <tr>
                  <th> <input type="submit" name="basic_save" value="Save" id="bd-btn-save" class="btn btn-primary"></th>
                  <th>
                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".basic_edit">
                    <i class="fa-solid fa-user-pen"></i>
                    </button>
                  
                  </th>
                </tr>
              </table>

            </form>
          </div>
          <!-- <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p> -->
        </div>
      </div>

    </div>
  </section>
  <!-- End Basic Details  Section -->


  <!-- The Modal for  Basic Details  -->
  <div class="modal basic_edit" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Basic Details</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <?php
          $sql2 = "SELECT * from user_info where user_id='{$userid}'";
          $result2 = mysqli_query($conn, $sql2);
          if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
          ?>

              <form action="<?php $_SERVER['PHP_SELF']; ?>" name="Basic details" id="bd" method="post">

                <table cellpadding="10" cellspacing="25">
                  <tr>
                    <th><strong>First Name</strong></th>
                    <th><strong>Last Name:</strong></th>
                    <th><strong>Date of birth:</strong></th>
                  </tr>
                  <tr>
                    <td><input type="text" name="firstname" id="firstname" value=<?php echo $row2['firstname']; ?>></td>
                    <td><input type="text" name="lastname" id="lastname" value=<?php echo $row2['lastname']; ?>></td>
                    <td> <input type="date" name="dob" id="dob" value=<?php echo $row2['dob']; ?>></td>
                  </tr>

                  <tr>
                    <th><strong>Phone:</strong></th>
                    <th><strong>Age:</strong></th>
                    <th><strong>State:</strong></th>
                  </tr>
                  <tr>
                    <td> <input type="text" name="phone" id="phone" maxsize="10" value=<?php echo $row2['phone']; ?>></td>
                    <td><input type="text" name="age" id="age" value=<?php echo $row2['age']; ?>></td>
                    <td><input type="text" name="state" id="state" value=<?php echo $row2['state']; ?>></td>
                  </tr>

                  <tr>
                    <th><strong>City:</strong></th>
                    <th><strong>Headline:</strong></th>

                  </tr>
                  <tr>
                    <td> <input type="text" name="city" id="city" value=<?php echo $row2['city']; ?>></td>
                    <td> <textarea rows="5" cols="20" placeholder="This text will be displayed below your name " name="headline"><?php echo $row2['headline']; ?></textarea></td>

                  </tr>
                  <tr>
                    <th> <input type="submit" name="basic_edit" value="Save" id="bd-btn-save" class="btn btn-primary"></th>

                  </tr>
                </table>

              </form>
          <?php
            }
          } else {
            echo "No record found";
          }
          ?>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  <!-- end of model for basic details -->



  <!-- Start  Current Details  Section -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Current Details</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        <!-- <div class="col-lg-4">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, ipsam!</P>
          </div> -->
        <div class="col-lg pt-4 pt-lg-0 content">
          <!-- <h3>Illustrator &amp; UI/UX Designer</h3> -->
          <h3>Add Experiance</h3>
          <!-- <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p> -->
          <div class="row">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" name="Basic details" id="bd" method="post">
              <table cellpadding="10" cellspacing="25">
                <tr>
                  <th><strong>Title</strong></th>
                  <th><strong>Employee Type</strong></th>
                  <th><strong>Company Name</strong></th>
                </tr>
                <tr>
                  <td><input type="text" name="title" id="title" placeholder="Ex: Retail Sales Manager" required></td>
                  <td><select name="employee_type">
                      <option value="full time">Full Time</option>
                      <option value="part time">Part Time</option>
                      <option value="self employeed">Self-Employed</option>
                      <option value="freelancer">Freelancer</option>
                    </select></td>
                  <td> <input type="text" name="company" id="company"></td>
                </tr>

                <tr>
                  <th><strong>State:</strong></th>
                  <th><strong>City:</strong></th>
                  <th><strong>Description:</strong></th>
                </tr>
                <tr>
                  <td> <input type="text" name="state" id="state"></td>
                  <td> <input type="text" name="city" id="city"></td>
                  <td> <textarea rows="7" cols="30" placeholder="Related to company working in  " name="desc"></textarea></td>
                </tr>

                <tr>
                  <th> <input type="submit" name="curr_save" value="Save" id="cp-btn-save" class="btn btn-primary"></th>
                  <th>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".curr_edit">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                  </th>
                </tr>
              </table>

            </form>
          </div>
          <!-- <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p> -->
        </div>
      </div>

    </div>
  </section><!-- End Current Details  Section -->

  <!-- start model for current status -->
  <div class="modal curr_edit" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Current details</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <?php
          $sql2 = "SELECT * from current_details where user_id='{$userid}'";
          $result2 = mysqli_query($conn, $sql2);
          if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
          ?>

              <form action="<?php $_SERVER['PHP_SELF']; ?>" name="current_details" id="bd" method="POST">
                <table cellpadding="10" cellspacing="25">
                  <tr>
                    <th><strong>Title</strong></th>
                    <th><strong>Employee Type</strong></th>
                    <th><strong>Company Name</strong></th>
                  </tr>
                  <tr>
                    <td><input type="text" name="title" id="title" placeholder="Ex: Retail Sales Manager" value="<?php echo $row2['title']; ?>"></td>
                    <td><select name="employee_type">
                        <option value="full time" <?php if (strcmp($row2['employee_type'], 'full time') == 0) {
                                                    echo 'selected';
                                                  } ?>>Full Time</option>
                        <option value="part time" <?php if (strcmp($row2['employee_type'], 'part time') == 0) {
                                                    echo 'selected';
                                                  } ?>>Part Time</option>
                        <option value="self employeed" <?php if (strcmp($row2['employee_type'], 'self employeed') == 0) {
                                                          echo 'selected';
                                                        } ?>>Self-Employed</option>
                        <option value="freelancer" <?php if (strcmp($row2['employee_type'], 'freelancer') == 0) {
                                                      echo 'selected';
                                                    } ?>>Freelancer</option>
                      </select></td>
                    <td> <input type="text" name="company" id="company" value="<?php echo $row2['company']; ?>"></td>
                  </tr>

                  <tr>
                    <th><strong>State:</strong></th>
                    <th><strong>City:</strong></th>
                    <th><strong>Description:</strong></th>

                  </tr>
                  <tr>
                    <td> <input type="text" name="state" id="state" value="<?php echo $row2['state']; ?>"></td>
                    <td> <input type="text" name="city" id="city" value="<?php echo $row2['city']; ?>"></td>
                    <td> <textarea rows="7" cols="30" name="desc"><?php echo $row2['description']; ?></textarea></td>
                  </tr>

                  <tr>
                    <th> <input type="submit" name="current_edit" value="Save" id="cp-btn-save" class="btn btn-primary"></th>

                  </tr>
                </table>

              </form>
          <?php
            }
          } else {
            echo "No record found";
          }
          ?>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>




  <!-- end of model for current status -->


  <!-- Start  Educational Details   Section -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Educational Details</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        <!-- <div class="col-lg-4">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, ipsam!</P>
          </div> -->
        <div class="col-lg pt-4 pt-lg-0 content">
          <!-- <h3>Illustrator &amp; UI/UX Designer</h3> -->
          <h3>Add Education</h3>
          <!-- <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p> -->
          <div class="row">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="Basic details" id="bd">
              <table cellpadding="10" cellspacing="25">
                <tr>
                  <th><strong>School/Collage/Univesity:</strong></th>
                  <th><strong>Degree</strong></th>
                  <th><strong>Field of study</strong></th>
                </tr>
                <tr>
                  <td><input type="text" name="university" id="university" required></td>
                  <td><input type="text" name="degree" id="degree" required></td>
                  <td> <input type="text" name="fstudy" id="fstudy"></td>
                </tr>

                <tr>
                  <th><strong>Start Month and year:</strong></th>
                  <th><strong>End Month and year:</strong></th>

                </tr>
                <tr>
                  <td> <input type="month" name="start" id="start"></td>
                  <td> <input type="month" name="end" id="end"></td>

                </tr>

                <tr>
                  <th><strong>Activities &amp; Societies:</strong></th>
                  <th><strong>Description:</strong></th>

                </tr>
                <tr>
                  <td> <textarea rows="7" cols="30" placeholder="Particepation in collage:" name="activities" required></textarea></td>
                  <td> <textarea rows="7" cols="30" placeholder="Information related to collage" name="description"></textarea></td>
                </tr>

                <tr>
                  <th> <input type="submit" name="edu_save" value="Save" id="cp-btn-save" class="btn btn-primary"></th>
                  <th>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".edu_edit" id="cp-btn-edit">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                  </th>
                </tr>
              </table>

            </form>
          </div>
          <!-- <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p> -->
        </div>
      </div>

    </div>
  </section><!-- End Educational Details  Section -->


  <!--  start model education -->

  <div class="modal edu_edit" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Education Details</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <?php
          $sql2 = "SELECT * from educational where user_id='{$userid}'";
          $result2 = mysqli_query($conn, $sql2);
          if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
          ?>

              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="Basic details" id="bd">
                <table cellpadding="10" cellspacing="25">
                  <tr>
                    <th><strong>School/Collage/Univesity:</strong></th>
                    <th><strong>Degree</strong></th>
                    <th><strong>Field of study</strong></th>
                  </tr>
                  <tr>
                    <td><input type="text" name="university" id="university" value="<?php echo $row2['university']; ?>"></td>
                    <td><input type="text" name="degree" id="degree" value="<?php echo $row2['degree']; ?> "></td>
                    <td> <input type="text" name="fstudy" id="fstudy" value="<?php echo $row2['field_of_study']; ?>"></td>
                  </tr>

                  <tr>
                    <th><strong>Start Month and year:</strong></th>
                    <th><strong>End Month and year:</strong></th>

                  </tr>
                  <tr>
                    <td> <input type="month" name="start" id="start" value="<?php echo $row2['start']; ?>"></td>
                    <td> <input type="month" name="end" id="end" value="<?php echo $row2['end']; ?>"></td>

                  </tr>

                  <tr>
                    <th><strong>Activities &amp; Societies:</strong></th>
                    <th><strong>Description:</strong></th>

                  </tr>
                  <tr>
                    <td> <textarea rows="7" cols="30" placeholder="Particepation in collage:" name="activities"><?php echo $row2['activities']; ?></textarea></td>
                    <td> <textarea rows="7" cols="30" placeholder="Information related to collage" name="description"><?php echo $row2['description']; ?></textarea></td>
                  </tr>

                  <tr>
                    <th> <input type="submit" name="edu_edit" value="Save" id="cp-btn-save" class="btn btn-primary"></th>

                  </tr>
                </table>

              </form>
          <?php
            }
          } else {
            echo "No record found";
          }
          ?>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  <!-- end model educaional -->

  <!-- Start  Upload work -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Upload work</h2>
        <p>Here you can upload all the images of the work you have done so far you can also upload web links</p>
      </div>

      <div class="row">
        <!-- <div class="col-lg-4">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, ipsam!</P>
          </div> -->
        <div class="col-lg pt-4 pt-lg-0 content">
          <!-- <h3>Illustrator &amp; UI/UX Designer</h3> -->
          <h3>Add Work</h3>
          <!-- <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p> -->
          <div class="row">
            <table cellpadding="5" cellspacing="10">

              <form action="<?php $_SERVER['PHP_SELF']; ?>" name="pro_img" id="pro_img" enctype="multipart/form-data" method="post">
                <tr>
                  <td>Select thumbnail image &nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="profile" id="profile"></td>
                  <td><label for="work">Work Description</label></td>
                  <td><textarea name="work_desc" id="" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                  <td>Give any reference to this work &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="link" placeholder="Ex: Web link" siz="200"></td>
                  
                </tr>
                <tr>
                  <td>Price start from &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="price"></td>
                  
                </tr>
                <tr>
                  <td>
                    <input type="submit" name="sub_work" value="Upload" id="cp-btn-save" class="btn btn-primary">
                    <!-- <input type="submit" name="sub_work" value="Upload"> -->
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>You will see all the images in work section</p>
                  </td>
                </tr>
              </form>

            </table>

          </div>
          <!-- <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p> -->
        </div>
      </div>

    </div>
  </section><!-- End Upload Work-->



  <!-- ======= Skills Section ======= -->
  <!-- <section id="skills" class="skills">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Skills</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row skills-content">

        <div class="col-lg-6">

          <div class="progress">
            <span class="skill">HTML <i class="val">100%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">CSS <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">JavaScript <i class="val">75%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="progress">
            <span class="skill">PHP <i class="val">80%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">WordPress/CMS <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Photoshop <i class="val">55%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>

      </div>

    </div>

  </section>End Skills Section -->

  <!-- ======= Facts Section ======= -->
  <!-- <section id="facts" class="facts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Facts</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>
    </section>End Facts Section -->

  <!-- ======= Testimonials Section ======= -->
  <!-- <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> End testimonial item 

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> End testimonial item 

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>< End testimonial item 

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>End testimonial item 

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> End testimonial item 

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
    End Testimonials Section 
  -->





</main><!-- End #main -->
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $("#pro_img").on("submit",function(e){
      e.preventDefault();
      alert("hi");
      var fromData=new FormData(this);
      $.ajax({
        url : "upload_pro_img.php",
        type : "POST",
        data : fromData,
        contentType : multipart/form-data,
        processData : false,
        success:function(data){
          $("#disp_pro").show.html(data);
          $("#profile").val='';
        }
      });
    });
  
  });

</script> -->
<?php require_once('footer.php'); ?>