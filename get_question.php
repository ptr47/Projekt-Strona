<?php
header('Content-Type: application/json');

$response = new stdClass();

include("session.php");
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {

    $question_id = $_GET['id'];
    $result = $connection->execute_query("SELECT * FROM quiz WHERE id = ?", [$question_id]);
    $question_data = $result->fetch_assoc();
    if ($question_data) {
        // Dodanie danych pytania do obiektu $response
        $response->question = $question_data['question'];
        $response->answer_a = $question_data['a'];
        $response->answer_b = $question_data['b'];
        $response->answer_c = $question_data['c'];
        $response->answer_d = $question_data['d'];
        $response->correct_answer = $question_data['answer'];
    }
}

// Zwrócenie odpowiedzi jako JSON
echo json_encode($response);