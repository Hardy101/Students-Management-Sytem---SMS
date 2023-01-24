<?php include 'assets/includes/db.php' ?>

<?php
session_start();
if (!isset($_SESSION['fname'])) {
  header('location:login.php');
} else {
  if ($_SESSION['acct_type'] == 'student' || $_SESSION['acct_type'] == 'admin') {
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
  <div class="main-wrapper">
    <?php include 'assets/includes/nav.php' ?>
    <?php include 'assets/includes/sidenav.php' ?>

    <div class="page-wrapper">
      <div class="content container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="page-title">Welcome Jonathan!</h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Teacher Dashboard</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-five w-100">
              <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                  <div class="db-icon">
                    <i class="fas fa-chalkboard"></i>
                  </div>
                  <div class="db-info">
                    <h3>04/06</h3>
                    <h6>Total Classes</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-six w-100">
              <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                  <div class="db-icon">
                    <i class="fas fa-user-graduate"></i>
                  </div>
                  <div class="db-info">
                    <h3>40/60</h3>
                    <h6>Total Students</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-seven w-100">
              <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                  <div class="db-icon">
                    <i class="fas fa-book-open"></i>
                  </div>
                  <div class="db-info">
                    <h3>30/50</h3>
                    <h6>Total Lessons</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-eight w-100">
              <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                  <div class="db-icon">
                    <i class="fas fa-clock"></i>
                  </div>
                  <div class="db-info">
                    <h3>15/20</h3>
                    <h6>Total Hours</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-lg-12 col-xl-9">
            <div class="row">
              <div class="col-12 col-lg-8 col-xl-8 d-flex">
                <div class="card flex-fill">
                  <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col-6">
                        <h5 class="card-title">Upcoming Lesson</h5>
                      </div>
                      <div class="col-6">
                        <span class="float-right view-link"><a href="#">View All Courses</a></span>
                      </div>
                    </div>
                  </div>
                  <div class="pt-3 pb-3">
                    <div class="table-responsive lesson">
                      <table class="table table-center">
                        <tbody>
                          <tr>
                            <td>
                              <div class="date">
                                <b>Aug 4, Tuesday</b>
                                <p>2.30pm - 3.30pm (60min)</p>
                              </div>
                            </td>
                            <td>
                              <div class="date">
                                <b>Lessons 30</b>
                                <p>3.1 Ipsuum dolor</p>
                              </div>
                            </td>
                            <td><a href="#">Confirmed</a></td>
                            <td>
                              <button type="submit" class="btn btn-info">
                                Reschedule
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="date">
                                <b>Aug 5, Wednesday</b>
                                <p>3.00pm - 4.30pm (90min)</p>
                              </div>
                            </td>
                            <td>
                              <div class="date">
                                <b>Lessons 31</b>
                                <p>3.2 Ipsuum dolor</p>
                              </div>
                            </td>
                            <td><a href="#">Confirmed</a></td>
                            <td>
                              <button type="submit" class="btn btn-info">
                                Reschedule
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="date">
                                <b>Aug 6, Thursday</b>
                                <p>11.00am - 12.00pm (20min)</p>
                              </div>
                            </td>
                            <td>
                              <div class="date">
                                <b>Lessons 32</b>
                                <p>3.3 Ipsuum dolor</p>
                              </div>
                            </td>
                            <td><a href="#">Confirmed</a></td>
                            <td>
                              <button type="submit" class="btn btn-info">
                                Reschedule
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-4 col-xl-4 d-flex">
                <div class="card flex-fill">
                  <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <h5 class="card-title">Semester Progress</h5>
                      </div>
                    </div>
                  </div>
                  <div class="dash-widget">
                    <div class="circle-bar circle-bar1">
                      <div class="circle-graph1" data-percent="50">
                        <b>50%</b>
                      </div>
                    </div>
                    <div class="dash-info">
                      <h6>Lesson Progressed</h6>
                      <h4>30 <span>/ 60</span></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-6 col-xl-8 d-flex">
                <div class="card flex-fill">
                  <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col-6">
                        <h5 class="card-title">Teaching Activity</h5>
                      </div>
                      <div class="col-6">
                        <ul class="list-inline-group text-right mb-0 pl-0">
                          <li class="list-inline-item">
                            <div class="form-group mb-0 amount-spent-select">
                              <select class="form-control form-control-sm">
                                <option>Weekly</option>
                                <option>Monthly</option>
                                <option>Yearly</option>
                              </select>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="apexcharts-area"></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6 col-xl-4 d-flex">
                <div class="card flex-fill">
                  <div class="card-header">
                    <h5 class="card-title">Teaching History</h5>
                  </div>
                  <div class="card-body">
                    <div class="teaching-card">
                      <ul class="activity-feed">
                        <li class="feed-item">
                          <div class="feed-date1">
                            Sep 05, 9 am - 10 am (60min)
                          </div>
                          <span class="feed-text1"><a>Lorem ipsum dolor</a></span>
                          <p><span>In Progress</span></p>
                        </li>
                        <li class="feed-item">
                          <div class="feed-date1">
                            Sep 04, 2 pm - 3 pm (70min)
                          </div>
                          <span class="feed-text1"><a>Et dolore magna</a></span>
                          <p>Completed</p>
                        </li>
                        <li class="feed-item">
                          <div class="feed-date1">
                            Sep 02, 1 pm - 2 am (80min)
                          </div>
                          <span class="feed-text1"><a>Exercitation ullamco</a></span>
                          <p>Completed</p>
                        </li>
                        <li class="feed-item">
                          <div class="feed-date1">
                            Aug 30, 10 am - 12 pm (90min)
                          </div>
                          <span class="feed-text1"><a>Occaecat cupidatat</a></span>
                          <p>Completed</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-12 col-xl-3 d-flex">
            <div class="card flex-fill">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-12">
                    <h5 class="card-title">Calendar</h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="calendar-doctor" class="calendar-container"></div>
                <div class="calendar-info calendar-info1">
                  <div class="calendar-details">
                    <p>09 am</p>
                    <h6 class="calendar-blue d-flex justify-content-between align-items-center">
                      Fermentum <span>09am - 10pm</span>
                    </h6>
                  </div>
                  <div class="calendar-details">
                    <p>10 am</p>
                    <h6 class="calendar-violet d-flex justify-content-between align-items-center">
                      Pharetra et <span>10am - 11am</span>
                    </h6>
                  </div>
                  <div class="calendar-details">
                    <p>11 am</p>
                    <h6 class="calendar-red d-flex justify-content-between align-items-center">
                      Break <span>11am - 11.30am</span>
                    </h6>
                  </div>
                  <div class="calendar-details">
                    <p>12 pm</p>
                    <h6 class="calendar-orange d-flex justify-content-between align-items-center">
                      Massa <span>11.30am - 12.00pm</span>
                    </h6>
                  </div>
                  <div class="calendar-details">
                    <p>09 am</p>
                    <h6 class="calendar-blue d-flex justify-content-between align-items-center">
                      Fermentum <span>09am - 10pm</span>
                    </h6>
                  </div>
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
  <?php include 'assets/includes/footer.php' ?>
  <script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
  <script src="assets/js/calander.js"></script>
  <script src="assets/js/circle-progress.min.js"></script>
</body>

</html>