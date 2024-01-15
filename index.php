<!DOCTYPE html>
<html lang="pl">

<?php
include("connect.php");
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Strona główna</title>
  <link rel="stylesheet" href="resource/main.css" />
  <link rel="stylesheet" href="resource/mobile.css" />
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
    <main>Witaj użytkowniku! <br>
      <a onclick="showModal()" href="#login">Zaloguj się</a> dla pełni doświadczeń. <br><br>
      Przewodnik: <br>
      <a href="index.html">Strona główna</a> - Tutaj jesteś<br>
      <a href="history.html">Historia</a> - Poznaj historię broni od prymitywnych rusznic po rewolwery i karabiny
      maszynowe<br>
      <a href="database.html">Baza danych</a> - Przeszukaj katalog informacji o wybranych broniach i amunicji<br>
      <a href="forum.html">Forum</a> - Udziel się na forum i porozmawiaj z ludźmi o podobnych zainteresowaniach<br>
      <a href="quiz.html">Quiz</a> - Sprawdź swoją wiedzę o broni i amunicji<br>
      <a href="classification.html">Klasyfikacja</a> - Dowiedz się w jaki sposób i według jakich kryterii jest
      podzielona broń(/amunicja?)<br><br>
      <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">Kliknij tutaj</a>, żeby kupić nielegalną
      broń
      <div class="contact">
        <h3>Chcesz się skontaktować?</h3>
        <form action="#" id="contact-form">
          <input type="text" name="title" id="contact-title" placeholder="Tytuł wiadomości"><br>
        </form>
        <textarea form="contact-form" name="comment" id="contact-text" placeholder="Wpisz swoją wiadomość"
          style="resize: none;"></textarea><br>
        <input form="contact-form" type="button" value="Wyślij wiadomość"
          onclick="alert('Twoja wiadomość nie została wysłana: Error 420') ">
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