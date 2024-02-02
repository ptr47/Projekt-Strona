<!DOCTYPE html>
<html lang="pl">

<?php
include("session.php");

if (!isset($_SESSION['login'])) {
  header("location: index.php");
  die();
}
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel użytkownika</title>
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
  </style>
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
        <?php
        echo '<img src="' . $_SESSION['pfp'] . '"/><br><br><br>';
        echo "<h2>" . $_SESSION['login'] . "</h2>"
          ?>
        <form action="user/edit_data.php" method="post" enctype="multipart/form-data">

          Zmień obrazek:
          <input type="file" id="pfp" name="pfp" accept="image/jpeg, image/png, image/gif"><br><br>
          Zmień datę urodzenia:
          <input type="date" id="birthdate" name="birthdate"><br>
          <?php echo "<small>Data urodzenia: " . $_SESSION['birthdate'] . "</small>" ?>
          <br><br>
          Zmień email:
          <input type="email" id="email" name="email"><br>
          <?php echo "<small>Aktualny email: " . $_SESSION['email'] . "</small>" ?>
          <br><br>
          Zmień hasło:
          <input type="text" id="password" name="password"><br>
          <?php echo "<small>Ostatnia zmiana: " . $_SESSION['lastchange'] . "</small>" ?>
          <br><br>

          <input type="submit" value="Zapisz">
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