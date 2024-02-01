<?php
require_once("connect.php");
session_start();


$login = $_POST['login'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];
$newsletter = $_POST['newsletter'];
if(empty($newsletter)) {
    $newsletter=0;
}
else {
    $newsletter =1;
}

$query = "SELECT * FROM users WHERE user='$login'";
$result = mysqli_query($connection, $query);
$count = $result->num_rows;
if (!$count == 0) {
    header("location: ../login_page.php?error=2");
} else {
    if ($password != $password_repeat) {
        header("location: ../login_page.php?error=3");
    } else {
        $query = "INSERT INTO users (id, user, pass, newsletter) VALUES (NULL, '$login', '$password', '$newsletter');";
        mysqli_query($connection, $query);
        $_SESSION['login'] = $login;
        $_SESSION['pfp'] = 'img/pfp/default-pfp.png';
        header("location: ../index.php?inf=1");
    }
}
$result->free_result();