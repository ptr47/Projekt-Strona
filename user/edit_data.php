<?php
require("../session.php");
if (!isset($_SESSION['login'])) {
    header("location: login_page.php");
    die();
}

if (isset($_FILES['pfp'])) {
    $file = $_FILES['pfp'];

    if ($file['error'] === 0) {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($fileType, $allowedTypes)) {

            $newFileName = uniqid() . '_' . $fileName;
            $fileDestination = '/img/pfp/' . $newFileName;
            if (!move_uploaded_file($fileTmpName, $fileDestination)) {
                echo "Wystąpił błąd podczas zapisywania pliku.";
            }
        } else {
            header("location: ../user_panel.php?err=format");
        }
    }
}
$user = $_SESSION['login'];
if (!empty($_POST['birthdate'])) {
    $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
    $sql = "UPDATE `users` SET `birthdate` = '$birthdate' WHERE `users`.`user` = '$user'; ";
    $connection->execute_query($sql);
    $_SESSION["birthdate"] = $birthdate;
}

if (!empty($_POST['email'])) {
    $email = trim($_POST['email']);
    $sql = "UPDATE `users` SET `email` = ? WHERE `users`.`user` = '$user'; ";
    $connection->execute_query($sql, [$email]);
    $_SESSION["email"] = $email;
}

if (!empty($_POST['password'])) {
    $password = $_POST['password'];
    $sql = "UPDATE `users` SET `pass` = ?, `pass_change` = current_timestamp() WHERE `users`.`user` = '$user'; ";
    $connection->execute_query($sql, [$password]);
    $_SESSION['lastchange'] = $connection->query("SELECT * FROM `users` WHERE `users`.`user` = '$user'; ")->fetch_assoc()['pass_change'];
}

header("location: ../user_panel.php");