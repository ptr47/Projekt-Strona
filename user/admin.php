<!DOCTYPE html>
<html lang="en">
<?php
include("../session.php");
if($_SESSION['login']!="admin")
header("location: ../index.php")
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administracyjny</title>
</head>

<body>
</body>

</html>