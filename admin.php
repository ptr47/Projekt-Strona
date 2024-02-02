<!DOCTYPE html>
<html lang="pl">
<?php
include("session.php");
if ($_SESSION['login'] != "admin")
  header("location: index.php");

$result = $connection->query("SELECT MAX(id) AS last_question_id FROM quiz");

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $last_question_id = $row["last_question_id"];
} else {
  $last_question_id = 0;
}
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel administracyjny</title>
  <link rel="stylesheet" href="resource/main.css" />
  <link rel="stylesheet" href="resource/mobile.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <script src="https://kit.fontawesome.com/e4a335c558.js" crossorigin="anonymous"></script>
  <script src="scripts/jquery-3.7.1.min.js"></script>
  <style>
    #edit-data {
      text-align: center;
    }

    #edit-data>img {
      height: 5rem;
    }

    form {
      margin-top: 2rem;
    }

    input[type="checkbox"] {
      margin-bottom: 1rem;
    }

    #question_id_field {
      display: none;
    }

    textarea,
    input[type="text"],
    select,
    input[type="submit"] {
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
  <script>

    document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("question_id").max = <?php echo $last_question_id; ?>;
    })
  </script>
  <script>
    function toggleQuestionIdField() {
      var checkBox = document.getElementById("change_question_checkbox");
      var questionIdField = document.getElementById("question_id_field");
      if (checkBox.checked == true) {
        questionIdField.style.display = "block";
        submitButton.value = "Zmień";
      } else {
        questionIdField.style.display = "none";
        document.getElementById("question_id").value = "";
        document.getElementById("question").value = "";
        document.getElementById("answer_a").value = "";
        document.getElementById("answer_b").value = "";
        document.getElementById("answer_c").value = "";
        document.getElementById("answer_d").value = "";
        document.getElementById("correct_answer").value = "";
        submitButton.value = "Dodaj";
      }
    }
    function getQuestionDetails() {
      var questionId = document.getElementById("question_id").value;
      if (questionId.trim() != "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            var questionData = JSON.parse(xhr.responseText);
            if (questionData) {
              document.getElementById("question").value = questionData.question;
              document.getElementById("answer_a").value = questionData.answer_a;
              document.getElementById("answer_b").value = questionData.answer_b;
              document.getElementById("answer_c").value = questionData.answer_c;
              document.getElementById("answer_d").value = questionData.answer_d;
              document.getElementById("correct_answer").value = questionData.correct_answer;
            }
          }
        };
        xhr.open("GET", "get_question.php?id=" + questionId, true);
        xhr.send();
      }
    }
    function changeEditPanel(typ) {
      if (typ == 0) {
        document.getElementById("edit-panel-quiz").style.display = "block";
        document.getElementById("heder").innerText = "Edytowanie Quizu";
      } 
      else if (typ == 1) {
        questionIdField.style.display = "none";
        document.getElementById("question_id").value = "";
        document.getElementById("question").value = "";
        document.getElementById("answer_a").value = "";
        document.getElementById("answer_b").value = "";
        document.getElementById("answer_c").value = "";
        document.getElementById("answer_d").value = "";
        document.getElementById("correct_answer").value = "";
        submitButton.value = "Dodaj";
      }
    }
  </script>

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
      <div id="edit-data">
        <div>
          <input onchange="changeEditPanel(0)" type="radio" name="change-edit-panel" id="radio-quiz" checked>
          <label for="radio-quiz">Quiz</label>
          <input onchange="changeEditPanel(1)" type="radio" name="change-edit-panel" id="radio-db">
          <label for="radio-db">Baza danych</label>
        </div>
        <h2 id="heder">Edytowanie quizu</h2>
        <form id="edit-panel-quiz" method="post" action="addchange_question.php">
          <input type="checkbox" id="change_question_checkbox" name="change_question_checkbox"
            onchange="toggleQuestionIdField()">Tryb Edycji Pytań<br><br>

          <div id="question_id_field">
            ID Pytania do zmiany:
            <input type="number" id="question_id" name="question_id" onchange="getQuestionDetails()" min="1"
              max=""><br><br>
          </div>

          Treść pytania:<br>
          <textarea id="question" name="question" rows="2" cols="100" required></textarea><br>

          <label for="answer_a">Odpowiedź A:</label><br>
          <input type="text" id="answer_a" name="answer_a" required><br>

          <label for="answer_b">Odpowiedź B:</label><br>
          <input type="text" id="answer_b" name="answer_b" required><br>

          <label for="answer_c">Odpowiedź C:</label><br>
          <input type="text" id="answer_c" name="answer_c" required><br>

          <label for="answer_d">Odpowiedź D:</label><br>
          <input type="text" id="answer_d" name="answer_d" required><br>

          Poprawna odpowiedź:
          <select id="correct_answer" name="correct_answer">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
          </select><br><br>

          <input type="submit" id="submitButton" value="Dodaj">
        </form>
      </div>
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