<?php
require_once("connect.php");
session_start();


$login = $_POST['login'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];
$newsletter = $_POST['newsletter'];
$email = $_POST['email'];
if (empty($newsletter)) {
    $newsletter = 0;
} else {
    $newsletter = 1;
}

$result = $connection->execute_query("SELECT * FROM users WHERE user=?", [$login]);
$count = $result->num_rows;
if (!$count == 0) {
    header("location: ../login_page.php?error=2");
} else {
    if ($password != $password_repeat) {
        header("location: ../login_page.php?error=3");
    } else {
        $connection->execute_query("INSERT INTO users (id, user, pass, email, newsletter) VALUES (NULL, ?, ?, ? ,'$newsletter');", [$login, $password, $email]);
        $_SESSION['login'] = $login;
        $_SESSION['pfp'] = "img/pfp/default-pfp.png";
        $_SESSION['lastchange'] = 'Nigdy';
        $_SESSION['birthdate'] = '';
        $_SESSION['email'] = $email;
        header("location: ../index.php?inf=1");
    }
}
$result->free_result();