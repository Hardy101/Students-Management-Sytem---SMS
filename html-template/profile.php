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
?>
<!-- QUERY CODE -->
<?php
// SELECTING INFORMATION TO DISPLAY SEPCIFIC TO ACCT LOGGED IN

if ($acct_type ==  'student') {
   $query = "SELECT * FROM students ";
} else if ($acct_type ==  'admin') {
   $query = "SELECT * FROM admin ";
} else if ($acct_type ==  'teacher') {
   $query = "SELECT * FROM teachers ";
}
$query .= "WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($result);
?>
<?php include 'assets/includes/header.php' ?>
<title>Preskool - Profile</title>
</head>

<body>
   <div class="main-wrapper">
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
                           <a href="#">
                              <img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
                           </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                           <h4 class="user-name mb-0"><?php echo $fname . ' ' . $lname ?></h4>
                           <div class="user-Location"><i class="fas fa-map-marker-alt"></i> Benin, Nigeria</div>
                           <!-- <div class="about-text">Lorem ipsum dolor sit amet.</div> -->
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
                                       <p class="col-sm-9"><?php echo $result['fname'] . ' ' . $result['lname'] ?></p>
                                    </div>
                                    <div class="row">
                                       <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                       <p class="col-sm-9"><?php echo $result['dob'] ?></p>
                                    </div>
                                    <div class="row">
                                       <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                       <p class="col-sm-9"><?php echo $result['email'] ?></p>
                                    </div>
                                    <div class="row">
                                       <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                       <p class="col-sm-9"><?php echo $result['mob_num'] ?></p>
                                    </div>
                                    <div class="row">
                                       <p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
                                       <p class="col-sm-9 mb-0"><?php echo $result['address'] ?>
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
                                    <button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> Active</button>
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
   <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
   <script src="assets/js/jquery-3.6.0.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
   <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
   <script src="assets/js/script.js"></script>
</body>

</html>