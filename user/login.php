<?php
require_once("connect.php");
session_start();


$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE user='$login' AND pass='$password'";

$result = mysqli_query($connection, $sql);
$count = $result->num_rows;
if ($count == 1) {
    $_SESSION['login'] = $login;
    header("location: ../index.php");
} else {
    header("location: login.php?error=1");
}
$result->free_result();
?>