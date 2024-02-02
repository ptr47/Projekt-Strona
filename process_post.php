<?php
require("session.php");
if (!isset($_SESSION['login'])) {
    header("location: login_page.php");
    die();
}
$title = $_POST["title"];
$content = $_POST["content"];
$username = $_SESSION['login'];
$userResult = $connection->query("SELECT id FROM users WHERE user= '$username'");
$userId = $userResult->fetch_row()[0];
$insertQuery = "INSERT INTO `posts` (`id`, `user_id`, `data`, `tresc`, `title`) VALUES (NULL, '$userId', current_timestamp(), ?, ?)";
$connection->execute_query($insertQuery, [$content, $title]);
header("location: forum.php");