<!DOCTYPE html>
<html lang="pl">

<?php
include("connect.php");
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
        <main>
            <button onclick="startQuiz()" id="quiz-start" class="button">START</button>
            <div class="quiz-container">
                <div class="quiz-question">
                    <p>Question?</p>
                    <input type="radio" name="question-1" id="q1-a"><label for="q1-a">A</label>
                    <input type="radio" name="question-1" id="q1-b"><label for="q1-b">B</label>
                    <input type="radio" name="question-1" id="q1-c"><label for="q1-c">C</label>
                    <input type="radio" name="question-1" id="q1-d"><label for="q1-d">D</label>
                </div>
                <div class="quiz-question">
                    <p>Question?</p>
                    <input type="radio" name="question-2" id="q2-a"><label for="q2-a">A</label>
                    <input type="radio" name="question-2" id="q2-b"><label for="q2-b">B</label>
                    <input type="radio" name="question-2" id="q2-c"><label for="q2-c">C</label>
                    <input type="radio" name="question-2" id="q2-d"><label for="q2-d">D</label>
                </div>
                <div class="quiz-question">
                    <p>Question?</p>
                    <input type="radio" name="question-3" id="q3-a"><label for="q3-a">A</label>
                    <input type="radio" name="question-3" id="q3-b"><label for="q3-b">B</label>
                    <input type="radio" name="question-3" id="q3-c"><label for="q3-c">C</label>
                    <input type="radio" name="question-3" id="q3-d"><label for="q3-d">D</label>
                </div>
                <div class="quiz-question">
                    <p>Question?</p>
                    <input type="radio" name="question-4" id="q4-a"><label for="q4-a">A</label>
                    <input type="radio" name="question-4" id="q4-b"><label for="q4-b">B</label>
                    <input type="radio" name="question-4" id="q4-c"><label for="q4-c">C</label>
                    <input type="radio" name="question-4" id="q4-d"><label for="q4-d">D</label>
                </div>
                <div class="quiz-question img-q">
                    <p>Dopasuj nazwy do obrazków</p>
                    <div class="question-images">
                        <div class="tile" id="q-i1"><img src="img/guns/M16A2.jpg" alt="Obrazek 1">
                            <p class="target"></p>
                        </div>
                        <div class="tile" id="q-i2"><img src="img/guns/Ak74.png" alt="Obrazek 2">
                            <p class="target"></p>
                        </div>
                        <div class="tile" id="q-i3"><img src="img/guns/M1918A2BAR.webp" alt="Obrazek 3">
                            <p class="target"></p>
                        </div>
                    </div>
                    <br>
                    <div class="question-names">
                        <div draggable="true" id="q-n1">M1 Garand</div>
                        <div draggable="true" id="q-n2">M16A2</div>
                        <div draggable="true" id="q-n3">AK-74</div>
                        <div draggable="true" id="q-n4">Beretta M9</div>
                        <div draggable="true" id="q-n5">M1918A2 BAR</div>
                    </div>
                </div>
                <br>
                <button onclick="endQuiz()" id="quiz-finish" class="button">Koniec</button>
            </div>
            <div id="quiz-result">
                <h3>Koniec quizu</h3>
                <p>Twój wynik to: </p>
            </div>
        </main>
        <footer>
            <!-- footer.html -->
        </footer>
    </div>
    <!--Scripts below-->
    <script src="scripts/load.js"></script>
    <script src="scripts/dropdownMenu.js"></script>
    <script src="scripts/quiz.js"></script>
    <script src="scripts/modal-login.js"></script>
    <!--End of scripts-->
</body>

</html>