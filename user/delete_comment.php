<?php
include("../session.php");

if (!empty($_POST["comment"])) {
    $comment = $_POST["comment"];
    $query = "DELETE FROM comments WHERE id='$comment';";
    $connection->query($query);
}
if (!empty($_POST["post"])) {
    $post = $_POST["post"];
    $query = "DELETE comments FROM comments INNER JOIN posts ON comments.post_id = posts.id WHERE posts.id = $post";
    $connection->query($query);
    $query = "DELETE FROM posts WHERE id='$post';";
    $connection->query($query);
}
header("location: ../forum.php");
