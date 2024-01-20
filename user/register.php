<?php
require_once("connect.php");
session_start();


$login = $_POST['login'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

$query = "SELECT * FROM users WHERE user='$login'";
$result = mysqli_query($connection, $query);
$count = $result->num_rows;
if (!$count == 0) {
    header("location: register.php?error=2");
} else {
    if ($password != $password_repeat) {
        header("location: register.php?error=3");
    }

    $query = "INSERT INTO users (id, user, pass) VALUES (NULL, '$login', '$password');";
    mysqli_query($connection, $query);
    header("location: login.php?inf=1");
}
$result->free_result();