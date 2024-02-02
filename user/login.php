<?php
require_once("connect.php");
session_start();


$login = $_POST['login'];
$password = $_POST['password'];


$result = $connection->execute_query("SELECT * FROM users WHERE user=? AND pass=?", [$login, $password]);

if ($result->num_rows == 1) {
    $_SESSION['login'] = $login;
    $_SESSION['pfp'] = "img/pfp/default-pfp.png";
    $row = $result->fetch_assoc();
    $lastchange = $row['pass_change'];
    $birthdate = $row['birthdate'];
    $email = $row['email'];
    if (empty($lastchange)) {
        $_SESSION['lastchange'] = 'Nigdy';
    } else {
        $_SESSION['lastchange'] = $lastchange;
    }
    $_SESSION['birthdate'] = $birthdate;
    $_SESSION['email'] = $email;
    header("location: ../index.php");
} else {
    header("location: ../login_page.php?error=1");
}
$result->free_result();