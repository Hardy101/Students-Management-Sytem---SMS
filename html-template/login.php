<?php include 'assets/includes/db.php' ?>
<?php include 'assets/includes/header.php' ?>
<?php
session_start();
if (isset($_POST['submit'])) {
  // $acct_type = $_POST['acct_type'];
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $psw = $_POST['psw'];

  $select = " SELECT * FROM users WHERE email_id = '$email' && password = '$psw' ";

  $result = mysqli_query($conn, $select);


  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    function sessionFunction()
    {
      global $row;
      $_SESSION['id'] = $row['user_id'];
      $_SESSION['email'] = $row['email_id'];
      $_SESSION['fname'] = $row['fname'];
      $_SESSION['lname'] = $row['lname'];
      $_SESSION['acct_type'] = $row['acct_type'];
      $_SESSION['class_arm'] = $row['class_arm'];
    }
    if ($row['acct_type'] == 'admin') {
      sessionFunction();
      header('location:index.php');
    } elseif ($row['acct_type'] == 'teacher') {
      sessionFunction();
      $_SESSION['class_arm'] = $row['class_arm'];
      header('location:teacher-dashboard.php');
    } elseif ($row['acct_type'] == 'student') {
      sessionFunction();
      header('location:student-dashboard.php');
    }
  } else {
    $error[] = 'incorrect email or password!';
  }
};
?>
<title>Preskool - Login</title>
</head>

<body>
  <div class="main-wrapper login-body">
    <div class="login-wrapper">
      <div class="container">
        <div class="loginbox">
          <div class="login-left">
            <img class="img-fluid" src="assets/img/logo-white.png" alt="Logo" />
          </div>
          <div class="login-right">
            <div class="login-right-wrap">
              <?php
              if (isset($error)) {
                foreach ($error as $error) {
                  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong>Error!</strong> $error
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>";
                }
              }
              ?>


              <h1>Login</h1>
              <?php
              if (isset($worked)) {
                foreach ($worked as $work) {
                  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Success!</strong> Your <a href='#' class='alert-link'>message</a> has been sent successfully.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>";
                }
              }
              ?>
              <p class="account-subtitle">Access to our dashboard</p>
              <form action="" method="POST">
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Email" name="email" />
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Password" name="psw" />
                </div>
                <!-- <div class="form-group">
                  <select name="acct_type" id="" class="form-control">
                    <option value="admin">admin</option>
                    <option value="teacher">teacher</option>
                    <option value="student">student</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit" name="submit">
                    Login
                  </button>
                </div>
              </form>
              <div class="text-center forgotpass">
                <a href="forgot-password.php">Forgot Password?</a>
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
  <script src="assets/js/script.js"></script>
</body>

</html>