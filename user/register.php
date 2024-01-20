<?php
require_once("connect.php");
session_start();


$login = $_POST['login'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

$sql = "SELECT * FROM uzytkownicy WHERE user='$login'";
$postSql = mysqli_query($polaczenie, $sql);
$count = $postSql->num_rows;
if (!$count == 0) {
    header("location: register.php?error=2");
} else {
    if ($password != $password_repeat) {
        header("location: register.php?error=3");
    }

    $sql = "INSERT INTO users (id, user, pass) VALUES (NULL, '$login', '$password');";
    mysqli_query($polaczenie, $sql);
    header("location: login.php?inf=1");
}