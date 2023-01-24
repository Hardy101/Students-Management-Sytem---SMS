<?php
function CreateUser()
{
    global $conn;
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email_id'];
    $password = $_POST['psw'];
    $acct_type = $_POST['acct_type'];

    $query = "INSERT INTO users(user_id, fname, lname, email_id, password, acct_type) ";
    $query .= "VALUES('$user_id', '$fname', '$lname', '$email', '$password', '$acct_type') ";

    $result = mysqli_query($conn, $query);
    // $result = $conn->$query;
    if ($result) {
        header('location: login.php');
    }
}
function CreateStudent()
{
    global $conn;
    $stud_id = $_POST['stud_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $class_arm = $_POST['class_arm'];
    $mob_num = $_POST['mob_num'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $religion = $_POST['religion'];
    $join_date = $_POST['join_date'];


    // Getting Image info
    $img_name = $_FILES['file']['name'];
    $img_size = $_FILES['file']['size'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];

    if ($error === 0) {
        if ($img_size > 1000000) {
            echo $error_msg =  "File Size too large";
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'jpg');
            // Checking if file format is supported
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/stud_img/' . $new_img_name;
                // Uploading the file to a directory
                move_uploaded_file($tmp_name, $img_upload_path);
                $query = "INSERT INTO students(stud_id, fname, lname, class_arm, mob_num, email, gender, dob, address, religion, join_date, image) ";
                $query .= "VALUES('$stud_id', '$fname', '$lname', '$class_arm', '$mob_num', '$email', '$gender', '$dob', '$address', '$religion', '$join_date', '$new_img_name')";
                $result = mysqli_query($conn, $query);
                header('location: students.php');
            } else {
                $error_msg = "Sorry, You can't upload file of this type";
            }
        }
    } else {
        $error_msg = "An error occured";
    }
}
function CreateSubject()
{
    global $conn;
    $sub_id = $_POST['sub_id'];
    $sub_name = $_POST['sub_name'];

    $query = "INSERT INTO subject(sub_id, sub_name) ";
    $query .= "VALUES('$sub_id', '$sub_name')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Request Could Not be completed!");
    } else {
        header('location: subjects.php');
    }
}
function CreateTeacher()
{
    global $conn;
    $teach_id = $_POST['teach_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mob_num = $_POST['mob_num'];
    $join_date = $_POST['join_date'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $class_arm = $_POST['class_arm'];
    $subject = $_POST['subject'];

    $query = "INSERT INTO teachers(teach_id, fname, lname, gender, class_arm, subject, email, dob, mob_num, join_date, address) ";
    $query .= "VALUES ('$teach_id', '$fname', '$lname', '$gender', '$class_arm', '$subject', '$email', '$dob', '$mob_num', '$join_date', '$address')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Something went wrong :(");
    }
}
function EditStudents()
{
    global $id;
    global $conn;
    $stud_id = $_POST['stud_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $class_arm = $_POST['class_arm'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mob_num = $_POST['mob_num'];
    $join_date = $_POST['join_date'];
    $address = $_POST['address'];
    $religion = $_POST['religion'];

    $query = "UPDATE students SET ";
    $query .= "stud_id = '$stud_id', ";
    $query .= "fname = '$fname', ";
    $query .= "lname = '$lname', ";
    $query .= "class_arm = '$class_arm', ";
    $query .= "gender = '$gender', ";
    $query .= "dob = '$dob', ";
    $query .= "mob_num = '$mob_num', ";
    $query .= "join_date = '$join_date', ";
    $query .= "address = '$address', ";
    $query .= "religion = '$religion' ";
    $query .= "WHERE id = $id";

    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location: students.php');
    }
}
function EditSubjects()
{
    global $conn;
    global $id;
    $sub_id = $_POST['sub_id'];
    $sub_name = $_POST['sub_name'];
    $query = "UPDATE subject SET ";
    $query .= "sub_id =     '$sub_id', ";
    $query .= "sub_name = '$sub_name' ";
    $query .= "WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location: subjects.php');
    }
}
function EditTeachers()
{
    global $id;
    global $conn;
    $teach_id = $_POST['teach_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mob_num = $_POST['mob_num'];
    $join_date = $_POST['join_date'];
    $address = $_POST['address'];

    $query = "UPDATE teachers SET ";
    $query .= "teach_id = '$teach_id', ";
    $query .= "fname = '$fname', ";
    $query .= "lname = '$lname', ";
    $query .= "gender = '$gender', ";
    $query .= "dob = '$dob', ";
    $query .= "mob_num = '$mob_num', ";
    $query .= "join_date = '$join_date', ";
    $query .= "address = '$address' ";
    $query .= "WHERE id = $id";

    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location: teachers.php');
    }
}
function deleteStudent()
{
    global $id;
    global $conn;
    $id = $_POST['id'];
    $query = "DELETE FROM students ";
    $query .= "WHERE id = $id";

    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location: students.php');
    }
}
