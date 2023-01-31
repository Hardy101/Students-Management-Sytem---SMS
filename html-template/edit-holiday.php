<?php include 'assets/includes/db.php' ?>
<?php
include 'assets/includes/functions.php';
AllowAdminOnly();
include 'assets/includes/details.php';
?>
<?php
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM holidays WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
}
?>
<?php if (isset($_POST['submit'])) {
    EditHoliday();
} ?>
<?php include 'assets/includes/header.php' ?>
<title>Preskool - Holiday</title>
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
                            <h3 class="page-title">Edit Holiday</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="holiday.php">Holiday</a></li>
                                <li class="breadcrumb-item active">Edit Holiday</li>
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
                                            <h5 class="form-title"><span>Holiday Information</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Holiday Name</label>
                                                <input name="name" type="text" class="form-control" value="<?php echo $result['name'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Type of Holiday</label>
                                                <select name="type" class="form-control" id="exampleFormControlSelect1" required>
                                                    <option>--Select Holiday--</option>
                                                    <option value="School Holiday">School Holiday</option>
                                                    <option value="Public Holiday">Public Holiday</option>
                                                    <option value="Exam Holiday">Exam Holiday</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input name="start_date" type="date" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input name="end_date" type="date" class="form-control" required>
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