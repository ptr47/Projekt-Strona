<?php
include("../session.php");
$login = $_SESSION['login'];

$query = "DELETE FROM users WHERE user='$login';";

$sql_posts = "UPDATE posts SET user_id = 0 WHERE user_id = (SELECT id FROM users WHERE user='$login')";
$sql_comments = "UPDATE comments SET user_id = 0 WHERE user_id = (SELECT id FROM users WHERE user='$login')";

$connection->query($sql_posts);
$connection->query($sql_comments);
$connection->query($query);

include("logout.php");
header("location: ../index.php");
