<?php
$db_name = 'preschool';
$server_name = "localhost";
$user_name = 'root';
$pass = '';

$conn = new mysqli($server_name, $user_name, $pass, $db_name);
if (!$conn) {
    die('Something went wrong :(');
}
