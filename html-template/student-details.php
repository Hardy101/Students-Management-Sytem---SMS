s<?php include 'assets/includes/db.php' ?>
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
<?php include 'assets/includes/header.php' ?>
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
</head>

<body>

    <div class="main-wrapper">
        <?php include 'assets/includes/nav.php' ?>
        <?php include 'assets/includes/sidenav.php' ?>


        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Student Details</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="students.php">Student</a></li>
                                <li class="breadcrumb-item active">Student Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="about-info">
                                    <h4>About Me</h4>
                                    <div class="media mt-3">
                                        <img src="uploads/stud_img/<?php echo $result['image'] ?>" class="mr-3" alt="...">
                                        <div class="media-body">
                                            <ul>
                                                <li>
                                                    <span class="title-span">Full Name : </span>
                                                    <span class="info-span"><?php echo $result['fname'] . ' ' . $result['lname'] ?></span>
                                                </li>
                                                <li>
                                                    <span class="title-span">Class : </span>
                                                    <span class="info-span"><?php echo $result['class_arm'] ?></span>
                                                </li>
                                                <li>
                                                    <span class="title-span">Mobile : </span>
                                                    <span class="info-span"><?php echo $result['mob_num'] ?></span>
                                                </li>
                                                <li>
                                                    <span class="title-span">Email : </span>
                                                    <span class="info-span"><?php echo $result['email'] ?></span>
                                                </li>
                                                <li>
                                                    <span class="title-span">Gender : </span>
                                                    <span class="info-span"><?php echo $result['gender'] . 'ale' ?></span>
                                                </li>
                                                <li>
                                                    <span class="title-span">DOB : </span>
                                                    <span class="info-span"><?php echo $result['dob'] ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <h5>Permanent Address</h5>
                                            <p><?php echo $result['address']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <h5>Present Address</h5>
                                            <p><?php echo $result['address'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="skill-info">
                                    <h4>Settings</h4>
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Current Password</label>
                                                    <input type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <p>Copyright © 2020 Dreamguys.</p>
            </footer>

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