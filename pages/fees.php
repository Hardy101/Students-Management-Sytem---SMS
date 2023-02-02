<?php include 'assets/includes/db.php' ?>
<?php
include 'assets/includes/functions.php';
AllowUsers();
include 'assets/includes/details.php'; 
?>
<?php
$query = "SELECT * FROM fees";
$result = mysqli_query($conn, $query);
?>
<?php include 'assets/includes/header.php' ?>
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<title>Preskool - Fees</title>
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
                            <h3 class="page-title">Fees</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Fees</li>
                            </ul>
                        </div>
                        <div class="col-auto text-right float-right ml-auto">
                            <a href="add-fees.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Fees</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0 datatable">
                                        <thead>

                                            <tr>
                                                <th>Fee Name</th>
                                                <th>Fee Description</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['fee_desc'] ?>
                                                    </td>
                                                    <td class="text-center">$<?php echo $row['amount'] ?></td>
                                                    <td class="text-right">
                                                        <div class="actions">
                                                            <a href="edit-fees.php?id=<?php echo $row['id'] ?>" class="btn btn-sm bg-success-light mr-2">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="delete/delete_fees.php?id=<?php echo $row['id'] ?>" class="btn btn-sm bg-danger-light">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endwhile ?>
                                        </tbody>
                                    </table>
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
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>