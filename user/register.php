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
    header("location: ../login_page.php?error=2");
} else {
    if ($password != $password_repeat) {
        header("location: ../login_page.php?error=3");
    } else {
        $query = "INSERT INTO users (id, user, pass) VALUES (NULL, '$login', '$password');";
        mysqli_query($connection, $query);
        $_SESSION['login'] = $login;
        header("location: ../index.php?inf=1");
    }
}
$result->free_result();