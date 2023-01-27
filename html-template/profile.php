<?php include 'assets/includes/db.php' ?>
<?php
session_start();
if (!isset($_SESSION['fname'])) {
   header('location:login.php');
} else {
}
$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$acct_type = $_SESSION['acct_type'];
$class_arm = $_SESSION['class_arm'];
?>
<?php
// SELECTING INFORMATION TO DISPLAY SEPCIFIC TO ACCOUNT LOGGED IN

if ($acct_type == 'student') {
   $query = "SELECT * FROM students ";
   $query .= "WHERE stud_id = '$user_id'"; 
} else if ($acct_type == 'admin') {
   $query = "SELECT * FROM admin ";
   $query .= "WHERE id = 1";
} else if ($acct_type == 'teacher') {
   $query = "SELECT * FROM teachers ";
   $query .= "WHERE teach_id = '$user_id'";
}
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($result);
?>
<!-- SUBMIT THE UPLOAD PICTURE FORM -->
<?php
if (isset($_POST['submit'])) {
   $img_name = $_FILES['file']['name'];
   $img_size = $_FILES['file']['size'];
   $tmp_name = $_FILES['file']['tmp_name'];
   $error = $_FILES['file']['error'];

   if ($error === 0) {
      if ($img_size > 1000000) {
         $error_msg[] =  "File Size too large";
      } else {
         $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
         $img_ex_lc = strtolower($img_ex);

         $allowed_exs = array('jpg', 'jpeg', 'jpg');
         // Checking if file format is supported
         if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            if ($acct_type == 'admin') {
               $img_upload_path = 'uploads/admin_img/' . $new_img_name;
            } else if ($acct_type == 'teacher') {
               $img_upload_path = 'uploads/teach_img/' . $new_img_name;
            } else if ($acct_type == 'student') {
               $img_upload_path = 'uploads/stud_img/' . $new_img_name;
            }
            // Uploading the file to a directory
            move_uploaded_file($tmp_name, $img_upload_path);
            if ($acct_type == 'admin') {
               $query = "UPDATE admin SET ";
               $query .= "image = '$new_img_name' ";
               $query .= "WHERE user_id = '$user_id'";
            } else if ($acct_type == 'teacher') {
               $query = "UPDATE teachers SET ";
               $query .= "image = '$new_img_name' ";
               $query .= "WHERE teach_id = '$user_id'";
            } else if ($acct_type == 'student') {
               $query = "UPDATE students SET ";
               $query .= "image = '$new_img_name' ";
               $query .= "WHERE stud_id = '$user_id'";
            }

            $result = mysqli_query($conn, $query);
            header('location: profile.php');
         } else {
            $error_msg = "Sorry, You can't upload file of this type";
         }
      }
   } else {
      $error_msg = "An error occured";
   }
}
?>
<?php include 'assets/includes/header.php' ?>
<link rel="stylesheet" href="assets/css/main.css">
<title>Preskool - Profile</title>
</head>

<body>
   <div class="main-wrapper">
      <div class="modal-nav hide"></div>
      <div class="modal-con hide">
         <form class="form-class" action="" method="post" enctype="multipart/form-data">
            <h4 class="text-center">Update Picture</h4>
            <?php
            if (isset($error_msg)) {
               echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
               <strong>Error!</strong> $error_msg
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
               </button>
               </div>";
            }
            ?>
            <div class="form-group mt-4">
               <input type="file" name="file" class="form-control" required>
            </div>
            <div class="form-group upload-div"><button type="submit" name="submit" class="btn btn-primary upload">Upload <i class="fa fa-upload"></i></button></div>
            <hr>
            <div class="form-group"><button class="btn btn-primary close-btn">Close <i class="fa fa-times"></i></button>
            </div>
         </form>
      </div>
      <?php include 'assets/includes/nav.php' ?>
      <?php include 'assets/includes/sidenav.php' ?>
      <div class="page-wrapper">

         <div class="content container-fluid">
            <div class="page-header">
               <div class="row">
                  <div class="col">
                     <h3 class="page-title">Profile</h3>
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="profile-header">
                     <div class="row align-items-center">
                        <div class="col-auto profile-image">
                           <?php if ($acct_type == 'admin') {
                              echo " <a href='#'>
                                 <img class='rounded-circle' alt='User Image' src='uploads/admin_img/{$result['image']}'>
                                 </a>";
                           } else if ($acct_type == 'student') {
                              echo "  <a href='#'>
                                 <img class='rounded-circle' alt='User Image' src='uploads/stud_img/{$result['image']}'>
                                 </a>";
                           } else if ($acct_type == 'teacher') {
                              echo "  <a href='#'>
                                 <img class='rounded-circle' alt='User Image' src='uploads/teach_img/{$result['image']}'>
                                 </a>";
                           }
                           ?>

                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                           <h4 class="user-name mb-0">
                              <?php echo $fname . ' ' . $lname ?>
                           </h4>
                           <div class="user-Location"><i class="fas fa-map-marker-alt"></i> Benin, Nigeria</div>
                           <button type="button" onclick="open_modal()" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit Profile Picture <i class="fas fa-edit"></i></button>
                        </div>
                     </div>
                  </div>
                  <div class="profile-menu">
                     <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                        </li>
                     </ul>
                  </div>
                  <div class="tab-content profile-tab-cont">
                     <div class="tab-pane fade show active" id="per_details_tab">
                        <div class="row">
                           <div class="col-lg-9">
                              <div class="card">
                                 <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                       <span>Personal Details</span>
                                       <a class="edit-link" href="edit-teacher.php?id=<?php echo $user_id ?>"><i class="far fa-edit mr-1"></i>Edit</a>
                                    </h5>
                                    <div class="row">
                                       <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                       <p class="col-sm-9">
                                          <?php echo $result['fname'] . ' ' . $result['lname'] ?>
                                       </p>
                                    </div>
                                    <div class="row">
                                       <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                       <p class="col-sm-9">
                                          <?php echo $result['dob'] ?>
                                       </p>
                                    </div>
                                    <div class="row">
                                       <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                       <p class="col-sm-9">
                                          <?php echo $result['email'] ?>
                                       </p>
                                    </div>
                                    <div class="row">
                                       <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                       <p class="col-sm-9">
                                          <?php echo $result['mob_num'] ?>
                                       </p>
                                    </div>
                                    <div class="row">
                                       <p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
                                       <p class="col-sm-9 mb-0">
                                          <?php echo $result['address'] ?>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="card">
                                 <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                       <span>Account Status</span>
                                       <a class="edit-link" href="#"><i class="far fa-edit mr-1"></i> Edit</a>
                                    </h5>
                                    <button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i>
                                       Active</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="password_tab" class="tab-pane fade">
                        <div class="card">
                           <div class="card-body">
                              <h5 class="card-title">Change Password</h5>
                              <div class="row">
                                 <div class="col-md-10 col-lg-6">
                                    <form>
                                       <div class="form-group">
                                          <label>Old Password</label>
                                          <input type="password" class="form-control">
                                       </div>
                                       <div class="form-group">
                                          <label>New Password</label>
                                          <input type="password" class="form-control">
                                       </div>
                                       <div class="form-group">
                                          <label>Confirm Password</label>
                                          <input type="password" class="form-control">
                                       </div>
                                       <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="assets/js/jquery-3.6.0.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
   <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
   <script src="assets/js/script.js"></script>
   <script src="assets/js/main.js"></script>
</body>

</html>