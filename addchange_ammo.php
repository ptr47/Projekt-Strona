<?php
include("session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['ammo_id'])) {

        $id = $_POST['ammo_id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $image = $_POST['image'];
        $sql = "UPDATE ammo SET name=?, type=?, image=? WHERE id=?";
        $params = [$name, $type, $image, $id];

    } else {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $image = $_POST['image'];
        $sql = "INSERT INTO ammo (name, type, image) VALUES (?, ?, ?)";

        $params = [$name, $type, $image];

    }

    $result = $connection->execute_query($sql, $params);
    header("location: admin.php");
}