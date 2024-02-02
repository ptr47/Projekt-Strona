<?php
include("session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['question_id'])) {

        $question_id = $_POST['question_id'];
        $question = $_POST['question'];
        $answer_a = $_POST['answer_a'];
        $answer_b = $_POST['answer_b'];
        $answer_c = $_POST['answer_c'];
        $answer_d = $_POST['answer_d'];
        $correct_answer = $_POST['correct_answer'];

        $sql = "UPDATE quiz SET question=?, a=?, b=?, c=?, d=?, answer=? WHERE id=?";
        $params = [$question, $answer_a, $answer_b, $answer_c, $answer_d, $correct_answer, $question_id];

    } else {
        $question = $_POST['question'];
        $answer_a = $_POST['answer_a'];
        $answer_b = $_POST['answer_b'];
        $answer_c = $_POST['answer_c'];
        $answer_d = $_POST['answer_d'];
        $correct_answer = $_POST['correct_answer'];

        $sql = "INSERT INTO quiz (question, a, b, c, d, answer) VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$question, $answer_a, $answer_b, $answer_c, $answer_d, $correct_answer];

    }

    $result = $connection->execute_query($sql, $params);
    header("location: admin.php");
}