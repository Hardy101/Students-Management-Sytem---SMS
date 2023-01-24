<?php include 'assets/includes/db.php' ?>
<?php
if (isset($_POST['submit'])) {
    $stud_id = $_POST['stud_id'];
    $class_arm = $_POST['class_arm'];
    $term = $_POST['term'];
    $upload_date = $_POST['upload_date'];
    $img_name = $_FILES['file']['name'];
    $img_size = $_FILES['file']['size'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    // ////////////////////////////////
    if ($error === 0) {
        if ($img_size > 1000000) {
            echo $error_msg =  "File Size too large";
        } else {
            // image size else
            // Returning the format of uploaded file
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array('pdf');
            // Checking if file format is supported
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                // Uploading the file to a directory
                move_uploaded_file($tmp_name, $img_upload_path);
                $query = "INSERT INTO results(stud_id, stud_class, term, upload_date, file) ";
                $query .= "VALUES('$stud_id', '$class_arm', '$term', '$upload_date', '$new_img_name')";
                $result = mysqli_query($conn, $query);
                header('location: results.php');
            } else {
                $error_msg = "Sorry, You can't upload file of this type";
            }
        }
    } else {
        $error_msg = "An error occured";
    }
}
