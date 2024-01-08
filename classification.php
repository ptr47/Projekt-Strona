<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasyfikacja</title>
    <link rel="stylesheet" href="resource/main.css">
    <link rel="stylesheet" href="resource/mobile.css">
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
            <div class="c-selector">
                Podział ze względu na:
                <select id="classification-select" onchange="checkValue()">
                    <option value="Rodzaj broni">rodzaj broni</option>
                    <option value="Automatyka broni">rodzaj zamka</option>
                    <option value="Tryb ognia broni">tryb ognia broni</option>
                    <option value="Rodzaj amunicji">rodzaj amunicji</option>
                </select>
            </div>
            <div class="classification">

            </div>
        </main>
        <footer>
            <!-- footer.html -->
        </footer>
    </div>
    
    <!--Scripts below-->
    <script src="scripts/load.js"></script>
    <script src="scripts/dropdownMenu.js"></script>
    <script src="scripts/typeChange.js"></script>
    <script src="scripts/modal-login.js"></script>
    <!--End of scripts-->
</body>

</html>