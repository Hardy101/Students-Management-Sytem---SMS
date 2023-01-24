<?php include '../assets/includes/db.php' ?>
<?php
global $conn;
$id = $_GET['id'];

$query = "DELETE FROM students ";
$query .= "WHERE id = $id";
$result = mysqli_query($conn, $query);
if ($result) {
    header('location: ../students.php');
}
