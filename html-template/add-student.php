<?php include 'assets/includes/db.php' ?>
<?php include 'assets/includes/functions.php' ?>
<?php if (isset($_POST['submit'])) {
   CreateStudent();
} ?>
<?php include 'assets/includes/header.php' ?>
<title>Preskool - Students</title>
</head>

<body>
   <div class="main-wrapper">
      <?php include 'assets/includes/nav.php' ?>
      <?php include 'assets/includes/sidenav.php' ?>
      <div class="page-wrapper">
         <div class="content container-fluid">
            <div class="page-header">
               <div class="row align-items-center">
                  <div class="col">
                     <h3 class="page-title">Add Students</h3>
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="students.php">Students</a></li>
                        <li class="breadcrumb-item active">Add Students</li>
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
                                    <input name="fname" type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="lname" type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Student Id</label>
                                    <input name="stud_id" type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Gender (M/F)</label>
                                    <input name="gender" type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div>
                                       <input name="dob" type="date" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Class</label>
                                    <input name="class_arm" type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Religion</label>
                                    <input name="religion" type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Joining Date</label>
                                    <div>
                                       <input name="join_date" type="date" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input name="mob_num" type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" type="text" class="form-control">
                                 </div>
                              </div>
                              <!-- <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Admission Number</label>
                                    <input type="text" class="form-control">
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
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Father's Occupation</label>
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Father's Mobile</label>
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Father's Email</label>
                                    <input type="email" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Mother's Name</label>
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Mother's Occupation</label>
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Mother's Mobile</label>
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Mother's Email</label>
                                    <input type="email" class="form-control">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Present Address</label>
                                    <textarea class="form-control"></textarea>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Permanent Address</label>
                                    <textarea class="form-control"></textarea>
                                 </div>
                              </div> -->
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