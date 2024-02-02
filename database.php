<!DOCTYPE html>
<html lang="pl">

<?php
include("session.php");
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baza danych</title>
  <link rel="stylesheet" href="resource/main.css" />
  <link rel="stylesheet" href="resource/mobile.css" />
  <link rel="stylesheet" href="resource/database.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <script src="https://kit.fontawesome.com/e4a335c558.js" crossorigin="anonymous"></script>
  <script src="scripts/jquery-3.7.1.min.js"></script>
  <script>
    var modal = document.getElementById("db-tile");

    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
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
      <!-- FILTER SYSTEM -->
      <div class="sort">
        <div class="search-bar">
          <input id="db-input" oninput="filter()" placeholder="Szukaj..."><button>
            <i class='fas fa-search'></i>
          </button>
        </div>
        <div class="sort-list">
          <div class="sort-type">
            <input onchange="changeAtoW()" type="radio" name="wpn-ammo" id="radio-wpn" checked>
            <label for="radio-wpn">Broń</label>
          </div>
          <div class="sort-type">
            <input onchange="changeWtoA()" type="radio" name="wpn-ammo" id="radio-ammo">
            <label for="radio-ammo">Amunicja</label>
          </div>
        </div>
        <div class="sort-list">
          Rodzaj:
          <select onchange="filter()" name="Rodzaj broni" id="db-type-wpn">
            <option value="" selected>-</option>
            <option value="pistolet">pistolet</option>
            <option value="rewolwer">rewolwer</option>
            <option value="pistolet maszynowy">pistolet maszynowy</option>
            <option value="karabin">karabinek</option>
            <option value="karabin">karabin</option>
            <option value="strzelba">strzelba</option>
          </select>
          <select onchange="filter()" name="Rodzaj amunicji" id="db-type-ammo">
            <option value="" selected>-</option>
            <option value="pistoletowa">pistoletowa</option>
            <option value="rewolwerowa">rewolwerowa</option>
            <option value="pośrednia">pośrednia</option>
            <option value="karabinowa">karabinowa</option>
            <option value="śrutowa">śrutowa</option>
          </select>
        </div>
        <div class="sort-list"><button onclick="resetFilters()" id="db-reset-button">Reset</button></div>
      </div>
      <!-- TODO: dynamically create tiles from db  -->
      <!-- CONTAINER WEAPONS -->
      <div class="tile-container" id="container-weapons">
        <?php $sql = "SELECT * FROM guns";
        $result = $connection->execute_query($sql);

        // Wyświetlenie wyników
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<div class="tile">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
            echo '<p class="tile-name">' .
              $row["name"] . '</p>';
            echo '<p class="tile-type">' . $row["type"] . '</p>';
            echo '<p class="tile-id">' .
              $row["id"] . '</p>';
            echo '</div>';
          }
        } else {
          echo "Brak wyników.";
        }
        ?>
      </div>
      <!-- CONTAINER AMMO -->
      <div class="tile-container" id="container-ammo">
      <?php $sql = "SELECT * FROM ammo";
        $result = $connection->execute_query($sql);

        // Wyświetlenie wyników
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<div class="tile">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
            echo '<p class="tile-name">' .
              $row["name"] . '</p>';
            echo '<p class="tile-type">' . $row["type"] . '</p>';
            echo '<p class="tile-id">' .
              $row["id"] . '</p>';
            echo '</div>';
          }
        } else {
          echo "Brak wyników.";
        }
        ?>
      </div>
    </main>
    <footer>
      <!-- footer.html -->
    </footer>
  </div>
  <!--Scripts below-->
  <script src="scripts/load.js"></script>
  <script src="scripts/dropdownMenu.js"></script>
  <script src="scripts/db-filter.js"></script>
  <script src="scripts/db-tile.js"></script>
  <script src="scripts/modal-login.js"></script>
  <!--End of scripts-->
</body>

</html>