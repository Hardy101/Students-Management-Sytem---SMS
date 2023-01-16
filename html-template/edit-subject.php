<?php include 'assets/includes/db.php' ?>
<?php include 'assets/includes/functions.php' ?>
<?php
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM subject WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
} else {
    $id = mysqli_real_escape_string($conn, 1);
    $query = "SELECT * FROM subject WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
}
?>
<?php if (isset($_POST['submit'])) {
    EditSubjects();
} ?>
<?php include 'assets/includes/header.php' ?>
<title>Preskool - Subject</title>
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
                            <h3 class="page-title">Edit Subject</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="subjects.php">Subject</a></li>
                                <li class="breadcrumb-item active">Edit Subject</li>
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
                                            <h5 class="form-title"><span>Subject Information</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Subject ID</label>
                                                <input name="sub_id" type="text" class="form-control" value="<?php echo $result['sub_id'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Subject Name</label>
                                                <input name="sub_name" type="text" class="form-control" value="<?php echo $result['sub_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Class</label>
                                                <input type="text" class="form-control" value="9">
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