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

$result = $connection->query("SELECT MAX(id) AS last_gun_id FROM guns");

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $last_gun_id = $row["last_gun_id"];
} else {
  $last_gun_id = 0;
}

$result = $connection->query("SELECT MAX(id) AS last_ammo_id FROM ammo");

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $last_ammo_id = $row["last_ammo_id"];
} else {
  $last_ammo_id = 0;
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

    #edit-panel-guns,
    #edit-panel-ammo,
    #guns_id_field,
    #ammo_id_field,
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
      document.getElementById("guns_id").max = <?php echo $last_gun_id; ?>;
      document.getElementById("ammo_id").max = <?php echo $last_ammo_id; ?>;
    })
  </script>
  <script>
    function toggleQuestionIdField() {
      var checkBox = document.getElementById("change_question_checkbox");
      var questionIdField = document.getElementById("question_id_field");
      var submitButton = document.getElementById("submit-question");
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
    function toggleGunsIdField() {
      var checkBox = document.getElementById("change_guns_checkbox");
      var questionIdField = document.getElementById("guns_id_field");
      var submitButton = document.getElementById("submit-guns");
      if (checkBox.checked == true) {
        questionIdField.style.display = "block";
        submitButton.value = "Zmień";
      } else {
        questionIdField.style.display = "none";
        document.getElementById("g-name").value = "";
        document.getElementById("g-type").value = "";
        document.getElementById("g-image").value = "";
        submitButton.value = "Dodaj";
      }
    }
    function toggleAmmoIdField() {
      var checkBox = document.getElementById("change_ammo_checkbox");
      var questionIdField = document.getElementById("ammo_id_field");
      var submitButton = document.getElementById("submit-ammo");
      if (checkBox.checked == true) {
        questionIdField.style.display = "block";
        submitButton.value = "Zmień";
      } else {
        questionIdField.style.display = "none";
        document.getElementById("a-name").value = "";
        document.getElementById("a-type").value = "";
        document.getElementById("a-image").value = "";
        submitButton.value = "Dodaj";
      }
    }
    function getDetails(typ) {
      var questionId = document.getElementById("question_id").value;
      var gunsId = document.getElementById("guns_id").value;
      var ammoId = document.getElementById("ammo_id").value;
      if (questionId.trim() != "" || gunsId.trim()!="" || ammoId.trim()!="") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            var questionData = JSON.parse(xhr.responseText);
            if (typ == 0) {
              if (questionData) {
                document.getElementById("question").value = questionData.question;
                document.getElementById("answer_a").value = questionData.answer_a;
                document.getElementById("answer_b").value = questionData.answer_b;
                document.getElementById("answer_c").value = questionData.answer_c;
                document.getElementById("answer_d").value = questionData.answer_d;
                document.getElementById("correct_answer").value = questionData.correct_answer;
              }
            } else if (typ == 1) {
              document.getElementById("g-name").value = questionData.name;
              document.getElementById("g-type").value = questionData.type;
              document.getElementById("g-image").value = questionData.image;
            } else if (typ == 2) {
              document.getElementById("a-name").value = questionData.name;
              document.getElementById("a-type").value = questionData.type;
              document.getElementById("a-image").value = questionData.image;
            }
          }
        };
        var idToSend = 0;
        if (typ == 0) {
          idToSend = questionId;
        } else if (typ == 1) {
          idToSend = gunsId;
        } else if (typ == 2) {
          idToSend = ammoId;
        }
        xhr.open("GET", "get_question.php?id=" + idToSend + "&typ=" + typ, true);
        xhr.send();
      }
    }
    function changeEditPanel(typ) {
      if (typ == 0) {
        document.getElementById("edit-panel-quiz").style.display = "block";
        document.getElementById("edit-panel-guns").style.display = "none";
        document.getElementById("edit-panel-ammo").style.display = "none";
        document.getElementById("heder").innerText = "Edytowanie Quizu";
      }
      else if (typ == 1) {
        document.getElementById("edit-panel-quiz").style.display = "none";
        document.getElementById("edit-panel-guns").style.display = "block";
        document.getElementById("edit-panel-ammo").style.display = "none";
        document.getElementById("heder").innerText = "Edytowanie Broni";
      }
      else if (typ == 2) {
        document.getElementById("edit-panel-quiz").style.display = "none";
        document.getElementById("edit-panel-guns").style.display = "none";
        document.getElementById("edit-panel-ammo").style.display = "block";
        document.getElementById("heder").innerText = "Edytowanie Amunicji";
      }
    }
    function clearData(name) {
      if (name == "quiz") {
        document.getElementById("question_id").value = "";
        document.getElementById("question").value = "";
        document.getElementById("answer_a").value = "";
        document.getElementById("answer_b").value = "";
        document.getElementById("answer_c").value = "";
        document.getElementById("answer_d").value = "";
        document.getElementById("correct_answer").value = "";
      }
      if (name == "guns") {
        document.getElementById("g-name").value = "";
        document.getElementById("g-type").value = "";
        document.getElementById("g-image").value = "";
      }
      if (name == "ammo") {
        document.getElementById("a-name").value = "";
        document.getElementById("a-type").value = "";
        document.getElementById("a-image").value = "";
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
          <input onchange="changeEditPanel(1)" type="radio" name="change-edit-panel" id="radio-guns">
          <label for="radio-guns">Bronie</label>
          <input onchange="changeEditPanel(2)" type="radio" name="change-edit-panel" id="radio-ammo">
          <label for="radio-ammo">Amunicja</label>
        </div>
        <h2 id="heder">Edytowanie quizu</h2>

        <!-- Formularz do dodawania/edycji pytań z quizu -->
        <form id="edit-panel-quiz" method="post" action="addchange_question.php">
          <input type="checkbox" id="change_question_checkbox" name="change_question_checkbox"
            onchange="toggleQuestionIdField()">Tryb Edycji Pytań<br><br>

          <div id="question_id_field">
            ID Pytania do zmiany:
            <input type="number" id="question_id" name="question_id" onchange="getDetails(0)" min="1" max=""><br><br>
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

          <input type="submit" id="submit-question" value="Dodaj">
        </form>

        <!-- Formularz do dodawania broni -->
        <form id="edit-panel-guns" action="addchange_guns.php" method="post">
          <input type="checkbox" id="change_guns_checkbox" name="change_guns_checkbox"
            onchange="toggleGunsIdField()">Tryb Edycji Broni<br><br>

          <div id="guns_id_field">
            ID broni do zmiany:
            <input type="number" id="guns_id" name="guns_id" onchange="getDetails(1)" min="1" max=""><br><br>
          </div>
          Nazwa modelu:
          <input type="text" id="g-name" name="name"><br><br>
          Typ:
          <select id="g-type" name="type">
            <option value="karabinek">Karabinek</option>
            <option value="karabin">Karabin</option>
            <option value="pistolet">Pistolet</option>
            <option value="pistolet maszynowy">Pistolet maszynowy</option>
            <option value="rewolwer">Rewolwer</option>
            <option value="strzelba">Strzelba</option>
          </select><br><br>
          Link do obrazka:
          <input type="text" id="g-image" name="image"><br><br>
          <input id="submit-guns" type="submit" value="Submit">
        </form>

        <!-- Formularz do dodawania amunicji -->
        <form id="edit-panel-ammo" action="addchange_ammo.php" method="post">
          <input type="checkbox" id="change_ammo_checkbox" name="change_ammo_checkbox"
            onchange="toggleAmmoIdField()">Tryb Edycji Amunicji<br><br>

          <div id="ammo_id_field">
            ID amunicji do zmiany:
            <input type="number" id="ammo_id" name="ammo_id" onchange="getDetails(2)" min="1" max=""><br><br>
          </div>
          Nazwa:
          <input type="text" id="a-name" name="name"><br><br>
          Typ:
          <select id="a-type" name="type">
            <option value="pistoletowa">Pistoletowa</option>
            <option value="rewolwerowa">Rewolwerowa</option>
            <option value="karabinowa">Karabinowa</option>
            <option value="pośrednia">Pośrednia</option>
            <option value="śrutowa">Śrutowa</option>
          </select><br><br>
          Link do obrazka:
          <input type="text" id="a-image" name="image"><br><br>
          <input id="sumbit-ammo" type="submit" value="Submit">
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