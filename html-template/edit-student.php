<?php include 'assets/includes/db.php' ?>
<?php
session_start();
if (!isset($_SESSION['fname'])) {
   header('location:login.php');
} else {
   if ($_SESSION['acct_type'] == 'student' || $_SESSION['acct_type'] == 'teacher') {
      header('location:error.php');
   }
}
$user_id = $_SESSION['email'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$acct_type = $_SESSION['acct_type'];
?>
<?php include 'assets/includes/functions.php' ?>
<?php include 'assets/includes/header.php' ?>
<?php
if (isset($_GET['id'])) {
   $id = mysqli_real_escape_string($conn, $_GET['id']);
   $query = "SELECT * FROM students WHERE id = $id";
   $result = mysqli_query($conn, $query);
   $result = mysqli_fetch_assoc($result);
} else {
   $id = mysqli_real_escape_string($conn, 1);
   $query = "SELECT * FROM students WHERE id = $id";
   $result = mysqli_query($conn, $query);
   $result = mysqli_fetch_assoc($result);
}
?>
<?php if (isset($_POST['submit'])) {
   EditStudents();
} ?>
<title>Preskool - Students</title>
</head>

<body>
   <?php include 'assets/includes/nav.php' ?>
   <div class="main-wrapper">
      <?php include 'assets/includes/sidenav.php' ?>
      <div class="page-wrapper">
         <div class="content container-fluid">
            <div class="page-header">
               <div class="row align-items-center">
                  <div class="col">
                     <h3 class="page-title">Edit Students</h3>
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="students.php">Students</a></li>
                        <li class="breadcrumb-item active">Edit Students</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-body">
                        <form action="" method="POST">
                           <div class="row">
                              <div class="col-12">
                                 <h5 class="form-title"><span>Student Information</span></h5>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>First Name</label>
                                    <input name="fname" type="text" class="form-control" value="<?php echo $result['fname'] ?>">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="lname" type="text" class="form-control" value="<?php echo $result['lname'] ?>">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Student Id</label>
                                    <input name="stud_id" type="text" class="form-control" value="<?php echo $result['stud_id'] ?>">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Gender</label>
                                    <input name="gender" type="text" class="form-control" value="<?php echo $result['gender'] ?>">

                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div>
                                       <input name="dob" type="date" class="form-control" value="<?php echo $result['dob'] ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Class</label>
                                    <input name="class_arm" type="text" class="form-control" value="<?php echo $result['class_arm'] ?>">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Religion</label>
                                    <input name="religion" type="text" class="form-control" value="<?php echo $result['religion'] ?>">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Joining Date</label>
                                    <div>
                                       <input name="join_date" type="date" class="form-control" value="<?php echo $result['join_date'] ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input name="mob_num" type="text" class="form-control" value="<?php echo $result['mob_num'] ?>">
                                 </div>
                              </div>
                              <!-- <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Admission Number</label>
                                    <input type="text" class="form-control" value="PRE1252">
                                 </div>
                              </div> -->
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Student Image</label>
                                    <input type="file" class="form-control">
                                 </div>
                              </div>
                              <!-- <div class="col-12">
                                 <h5 class="form-title"><span>Parent Information</span></h5>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Father's Name</label>
                                    <input type="text" class="form-control" value="Stephen Marley">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Father's Occupation</label>
                                    <input type="text" class="form-control" value="Technician">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Father's Mobile</label>
                                    <input type="text" class="form-control" value="	402 221 7523">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Father's Email</label>
                                    <input type="email" class="form-control" value="stephenmarley@gmail.com">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Mother's Name</label>
                                    <input type="text" class="form-control" value="Cleary Wong">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Mother's Occupation</label>
                                    <input type="text" class="form-control" value="Home Maker">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Mother's Mobile</label>
                                    <input type="text" class="form-control" value="026 7318 4366">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Mother's Email</label>
                                    <input type="email" class="form-control" value="clearywong@gmail.com">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Present Address</label>
                                    <textarea class="form-control">86 Lamphey Road, Thelnetham</textarea>
                                 </div>
                              </div>
                             
                              </div> -->
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Permanent Address</label>
                                    <textarea name="address" class="form-control"><?php echo $result['address'] ?></textarea>
                                 </div>
                                 <div class="col-12">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                 </div>
                              </div>
                        </form>
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
</body>

</html>