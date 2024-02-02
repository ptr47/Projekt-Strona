<!DOCTYPE html>
<html lang="pl">

<?php
include("session.php");

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz</title>
    <link rel="stylesheet" href="resource/main.css" />
    <link rel="stylesheet" href="resource/mobile.css" />
    <link rel="stylesheet" href="resource/database.css" />
    <link rel="stylesheet" href="resource/quiz.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <script src="https://kit.fontawesome.com/e4a335c558.js" crossorigin="anonymous"></script>
    <script src="scripts/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="modal" id="login-modal">
        <div class="modal-content" id="include-login">
            <!-- login_modal.html -->
        </div>
    </div>

    <div class="container">
        <header>
            <!-- navbar.html -->
        </header>
        <main style="text-align: center;">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $score = 0;

                    foreach ($_POST as $key => $value) {
                        $question_id = str_replace("question-", "", $key);
                        $result = $connection->execute_query("SELECT answer FROM quiz WHERE id = $question_id");

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            if ($value === $row['answer']) {
                                $score++;
                            }
                        }
                    }

                    echo "<h3>Koniec quizu</h3>";
                    echo "<p>Twój wynik to: $score/5</p>";
                } else {
                    header("location: quiz.php");
                }
                ?>
                <a href="quiz.php">Wróć</a>
        </main>
        <footer>
            <!-- footer.html -->
        </footer>
    </div>
    <!--Scripts below-->
    <script src="scripts/load.js"></script>
    <script src="scripts/dropdownMenu.js"></script>
    <script src="scripts/modal-login.js"></script>
    <!--End of scripts-->
</body>

</html>