<?php include 'assets/includes/db.php' ?>
<?php
$query = "SELECT * FROM subject ORDER BY sub_name ASC";
$show_all_subjects = mysqli_query($conn, $query);
?>
<?php include 'assets/includes/header.php' ?>
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<title>Preskool - Subjects</title>
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
                     <h3 class="page-title">Subjects</h3>
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Subjects</li>
                     </ul>
                  </div>
                  <div class="col-auto text-right float-right ml-auto">
                     <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                     <a href="add-subject.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                    <th class="text-right">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php while ($row = mysqli_fetch_assoc($show_all_subjects)) : ?>
                                    <tr>
                                       <td><?php echo $row['sub_id'] ?></td>
                                       <td>
                                          <h2>
                                             <a><?php echo $row['sub_name'] ?></a>
                                          </h2>
                                       </td>
                                       <td>4</td>
                                       <td class="text-right">
                                          <div class="actions">
                                             <a href="edit-subject.php?id=<?php echo $row['id'] ?>" class="btn btn-sm bg-success-light mr-2">
                                                <i class="fas fa-pen"></i>
                                             </a>
                                             <a href="#" class="btn btn-sm bg-danger-light">
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
<!-- Mirrored from preschool.dreamguystech.com/html-template/subjects.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->

</html>