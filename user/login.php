<?php
require_once("connect.php");
session_start();


$login = $_POST['login'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE user='$login' AND pass='$password'";

$result = mysqli_query($connection, $query);

if ($result->num_rows == 1) {
    $_SESSION['login'] = $login;
    $obr = $result->fetch_assoc()['pfp'];
    if(empty($obr)) {
        $_SESSION['pfp'] = 'img/pfp/default-pfp.png';
    } else {
        $_SESSION['pfp'] = $result->fetch_assoc()['pfp'];
    }
    header("location: ../index.php");
} else {
    header("location: ../login_page.php?error=1");
}
$result->free_result();