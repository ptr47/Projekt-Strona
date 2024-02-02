<?php
header('Content-Type: application/json');

$response = new stdClass();

include("session.php");
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['typ'])) {

    $typ = $_GET['typ'];
    $id = $_GET['id'];
    if ($typ == 0) {
        $result = $connection->execute_query("SELECT * FROM quiz WHERE id = ?", [$id]);
        $data = $result->fetch_assoc();
        if ($data) {
            // Dodanie danych pytania do obiektu $response
            $response->question = $data['question'];
            $response->answer_a = $data['a'];
            $response->answer_b = $data['b'];
            $response->answer_c = $data['c'];
            $response->answer_d = $data['d'];
            $response->correct_answer = $data['answer'];
        }
    } else if ($typ == 1) {
        $result = $connection->execute_query("SELECT * FROM guns WHERE id = ?", [$id]);
        $data = $result->fetch_assoc();
        if ($data) {
            // Dodanie danych pytania do obiektu $response
            $response->name = $data['name'];
            $response->type = $data['type'];
            $response->image = $data['image'];
        }
    } else if ($typ == 2) {
        $result = $connection->execute_query("SELECT * FROM ammo WHERE id = ?", [$id]);
        $data = $result->fetch_assoc();
        if ($data) {
            // Dodanie danych pytania do obiektu $response
            $response->name = $data['name'];
            $response->type = $data['type'];
            $response->image = $data['image'];
        }
    }
}

// Zwrócenie odpowiedzi jako JSON
echo json_encode($response);