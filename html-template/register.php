<?php include 'assets/includes/db.php' ?>
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
<?php include 'assets/includes/functions.php' ?>
<?php if (isset($_POST['submit'])) {
  CreateUser();
} ?>
<?php include 'assets/includes/header.php' ?>
<title>Preskool - Register</title>
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
              <h1>Register</h1>
              <p class="account-subtitle">Access to our dashboard</p>

              <form action="" method="POST">
                <div class="form-group">
                  <input name="user_id" class="form-control" type="text" placeholder="User Id" />
                </div>
                <div class="form-group">
                  <input name="fname" class="form-control" type="text" placeholder="First Name" />
                </div>
                <div class="form-group">
                  <input name="lname" class="form-control" type="text" placeholder="Last Name" />
                </div>
                <div class="form-group">
                  <input name="email_id" class="form-control" type="text" placeholder="Email" />
                </div>
                <div class="form-group">
                  <input name="psw" class="form-control" type="text" placeholder="Password" />
                </div>
                <div class="form-group">
                  <select class="form-control" name="acct_type">
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                  </select>
                </div>
                <div class="form-group mb-0">
                  <button name="submit" class="btn btn-primary btn-block" type="submit">
                    Register
                  </button>
                </div>
              </form>

              <div class="login-or">
                <span class="or-line"></span>
                <span class="span-or">or</span>
              </div>

              <div class="text-center dont-have">
                Already have an account? <a href="login.html">Login</a>
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