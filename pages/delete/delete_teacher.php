<?php include '../assets/includes/db.php' ?>
<?php
global $conn;
$id = $_GET['id'];

$query = "DELETE FROM teachers ";
$query .= "WHERE id = $id";
$result = mysqli_query($conn, $query);
if ($result) {
    header('location: teachers.php');
}
