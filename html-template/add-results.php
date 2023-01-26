<?php include 'assets/includes/db.php' ?>
<?php
session_start();
if (!isset($_SESSION['fname'])) {
    header('location:login.php');
} else {
    if ($_SESSION['acct_type'] == 'student') {
        header('location:error.php');
    }
}
$user_id = $_SESSION['email'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$acct_type = $_SESSION['acct_type'];
?>
<?php include 'assets/includes/header.php' ?>
<link rel="stylesheet" href="assets/plugins/simple-calendar/simple-calendar.css">
<title>Preskool - Dashboard</title>
</head>

<body>
    <?php include 'assets/includes/db.php' ?>
    <?php
    session_start();
    if (!isset($_SESSION['fname'])) {
        header('location:login.php');
    } else {
        if ($_SESSION['acct_type'] == 'student') {
            header('location:error.php');
        }
    }
    $user_id = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $acct_type = $_SESSION['acct_type'];
    ?>
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
                                <h3 class="page-title">Add Results</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="results.php">Results</a></li>
                                    <li class="breadcrumb-item active">Add Results</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="form-title"><span>Student Information</span></h5>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Student Id</label>
                                                    <input name="stud_id" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Student Class</label>
                                                    <input name="class_arm" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Term</label>
                                                    <input name="term" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Upload Date</label>
                                                    <div>
                                                        <input name="upload_date" type="date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Result</label>
                                                    <input name="file" type="file" class="form-control">
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

    </html>
</body>

</html>