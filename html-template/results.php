<?php include 'assets/includes/db.php' ?>
<?php include 'assets/includes/header.php' ?>
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<title>Preskool - Results</title>
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
                            <h3 class="page-title">Results</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Results</li>
                            </ul>
                        </div>
                        <div class="col-auto text-right float-right ml-auto">
                            <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                            <a href="add-student.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                                <th>ID</th>
                                                <th>Student Name</th>
                                                <th>Student Class</th>
                                                <th>Term</th>
                                                <th>Year</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a href="edit-results.php" class="btn btn-sm bg-success-light mr-2">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <a href="delete_results.php" class="btn btn-sm bg-danger-light">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
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