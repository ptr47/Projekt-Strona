<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "projekt";
// Create connection
$connection = new mysqli($servername, $db_username, $db_password, $db_name);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
?> 