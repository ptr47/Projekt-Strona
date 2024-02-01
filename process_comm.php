<?php
require("session.php");
if (!isset($_SESSION['login'])) {
    header("location: login_page.php");
    die();
}
$content = $_POST["content"];
$post_id = $_POST["post"];
$username = $_SESSION['login'];
$userResult = $connection->query("SELECT id FROM users WHERE user= '$username'");
$userId = $userResult->fetch_row()[0];
$insertQuery = "INSERT INTO `comments` (`id`, `post_id`, `user_id`, `data`, `tresc`) VALUES (NULL, '$post_id', '$userId', current_timestamp(), '$content') ";
$connection->query($insertQuery);
header("location: forum.php");