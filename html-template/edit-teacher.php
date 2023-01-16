<?php include 'assets/includes/db.php' ?>
<?php
session_start();
if (!isset($_SESSION['fname'])) {
    header('location:login.php');
} else {
    if (!$_SESSION['acct_type'] == 'admin') {
        header('location:error.php');
    }
}
$user_id = $_SESSION['email'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$acct_type = $_SESSION['acct_type'];
?>
<?php include 'assets/includes/functions.php' ?>

<?php
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM teachers WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
} else {
    $id = mysqli_real_escape_string($conn, 1);
    $query = "SELECT * FROM teachers WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
}
?>
<?php if (isset($_POST['submit'])) {
    EditTeachers();
} ?>
<?php include 'assets/includes/header.php' ?>
<title>Preskool - Teachers</title>
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
                            <h3 class="page-title">Edit Teachers</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="teachers.html">Teachers</a></li>
                                <li class="breadcrumb-item active">Edit Teachers</li>
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
                                            <h5 class="form-title"><span>Basic Details</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Teacher ID</label>
                                                <input name="teach_id" type="text" class="form-control" value="<?php echo $result['teach_id'] ?>">
                                            </div>
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
                                                <label>Gender</label>
                                                <input name="gender" type="text" class="form-control" value="<?php echo $result['gender'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input name="dob" type="text" class="form-control" value="<?php echo $result['dob'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input name="mob_num" type="text" class="form-control" value="<?php echo $result['mob_num'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Joining Date</label>
                                                <input name="join_date" type="text" class="form-control" value="<?php echo $result['join_date'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Qualification</label>
                                                <input class="form-control" type="text" value="Bachelor of Engineering">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Experience</label>
                                                <input class="form-control" type="text" value="5">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Login Details</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" value="Vincent">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Email ID</label>
                                                <input type="email" class="form-control" value="vincent20@gmail.com">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" value="vincent">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Repeat Password</label>
                                                <input type="password" class="form-control" value="vincent">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Address</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input name="address" type="text" class="form-control" value="<?php echo $result['address'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" value="Omaha">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" value="Omaha">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" class="form-control" value="3979">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" value="USA">
                                            </div>
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

<!-- Mirrored from preschool.dreamguystech.com/html-template/edit-teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->

</html>