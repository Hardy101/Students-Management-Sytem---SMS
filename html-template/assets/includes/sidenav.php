<?php
// if (!$id == 'admin') {
//     header('location:');
// }
?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa-solid fa-th"></i><span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php">Admin Dashboard</a></li>
                        <li><a href="teacher-dashboard.php">Teacher Dashboard</a></li>
                        <li><a href="student-dashboard.php">Student Dashboard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="students.php">Student List</a></li>
                        <li><a href="add-student.php">Student Add</a></li>
                        <li><a href="edit-student.php">Student Edit</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="teachers.php">Teacher List</a></li>
                        <li><a href="add-teacher.php">Teacher Add</a></li>
                        <li><a href="edit-teacher.php">Teacher Edit</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-book-reader"></i> <span> Subjects</span> <span class="menu-arrow"></span></a>
                    <ul>

                        <li><a href="subjects.php">Subject List</a></li>
                        <li><a href="add-subject.php">Subject Add</a></li>
                        <li><a href="edit-subject.php">Subject Edit</a></li>
                    </ul>
                </li>


                <li class="menu-title">
                    <span>Pages</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-comment-dollar"></i> <span> Fees</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="results.php">Fees</a></li>
                        <li><a href="add-results.php">Add Fees</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fas fa-file-alt"></i> <span> Results</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="results.php">Results List</a></li>
                        <li><a href="add-results.php">Result Upload</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                </li>
                <li>
                    <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
                </li>
                <?php
                if ($acct_type == 'admin') {


                    echo " 
                    <li class='menu-title'>
                    <span>Pages</span>
                    </li>
                     <li class='submenu'>
                        <a href='#'><i class='fas fa-shield-alt'></i> <span> Authentication </span> <span class='menu-arrow'></span></a>
                    <ul>
                      <li><a href='login.php'>Login</a></li>
                      <li><a href='register.php'>Register</a></li>
                      <li><a href='forgot-password.php'>Forgot Password</a></li>
                    </ul>
                    </li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>