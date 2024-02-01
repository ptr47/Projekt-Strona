<?php
include("../session.php");
$login = $_SESSION['login'];

$query = "DELETE FROM users WHERE user='$login';";

mysqli_query($connection, $query);

include("logout.php");
header("location: ../index.php");
