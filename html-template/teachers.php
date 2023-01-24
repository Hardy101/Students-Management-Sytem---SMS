<?php include 'assets/includes/db.php' ?>
<?php
session_start();
if (!isset($_SESSION['fname'])) {
    header('location:login.php');
}
$user_id = $_SESSION['email'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$acct_type = $_SESSION['acct_type'];
?>
<?php
$query = "SELECT * FROM teachers";
$show_all_teachers = mysqli_query($conn, $query);
?>
<?php include 'assets/includes/header.php' ?>
<?php
$query = "SELECT * FROM teachers";
$result = mysqli_query($conn, $query);
?>
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
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
                            <h3 class="page-title">Teachers</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Teachers</li>
                            </ul>
                        </div>
                        <div class="col-auto text-right float-right ml-auto">
                            <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                            <a href="add-teacher.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Gender</th>
                                                <th>Subject</th>
                                                <th>Section</th>
                                                <th>Mobile Number</th>
                                                <th>Address</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <tr>
                                                    <td><?php echo $row['teach_id'] ?></td>
                                                    <td>
                                                        <h2 class='table-avatar'>
                                                            <a href='teacher-details.php' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='assets/img/profiles/avatar-02.jpg' alt='User Image'></a>
                                                            <a href='teacher-details.php'><?php echo $row['fname'] ?></a>
                                                        </h2>
                                                    </td>
                                                    <td><?php echo $row['class_arm'] ?></td>
                                                    <td><?php echo $row['gender'] ?></td>
                                                    <td><?php echo $row['subject'] ?></td>
                                                    <td><?php echo $row['class_arm'] ?></td>
                                                    <td><?php echo $row['mob_num'] ?></td>
                                                    <td><?php echo $row['address'] ?></td>
                                                    <td class='text-right'>
                                                        <div class='actions'>
                                                            <a href='edit-teacher.php?id=<?php echo $row['id'] ?>' class='btn btn-sm bg-success-light mr-2'>
                                                                <i class='fas fa-pen'></i>
                                                            </a>
                                                            <a href='delete_teacher.php?id=<?php echo $row['id'] ?>' class='btn btn-sm bg-danger-light'>
                                                                <i class='fas fa-trash'></i>
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