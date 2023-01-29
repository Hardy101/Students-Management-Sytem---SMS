<?php include 'assets/includes/db.php' ?>
<?php
include 'assets/includes/functions.php';
AllowAdminOnly();
include 'assets/includes/details.php';
?>
<?php
////////////////////////
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM fees WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
}
if (isset($_POST['submit'])) {
    EditFees();
}
?>
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
                            <h3 class="page-title">Edit Fees</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="fees.html">Fees</a></li>
                                <li class="breadcrumb-item active">Edit Fees</li>
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
                                            <h5 class="form-title"><span>Fees Information</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Fee Name</label>
                                                <input name="name" type="text" class="form-control" value="<?php echo $result['name'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Fees Type</label>
                                                <select class="form-control" name="fee_type" required>
                                                    <option>--Select Type--</option>
                                                    <option value="Mandatory">Mandatory</option>
                                                    <option value="Elective">Elective</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Fees Description</label>
                                                <select class="form-control" name="fee_desc" required>
                                                    <option>--Select Type--</option>
                                                    <option value="School Fees">School Fees</option>
                                                    <option value="Transport Fees">Transport Fees</option>
                                                    <option value="Feeding">Feeding</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Fees Amount</label>
                                                <input name="amount" type="number" class="form-control" value="<?php echo $result['amount'] ?>" required>
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

<!-- Mirrored from preschool.dreamguystech.com/html-template/edit-fees.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:12:21 GMT -->

</html>