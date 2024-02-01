<html>
<?php
include("../session.php");
?>
<style>
    .menu {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .menu ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .menu li {
        display: inline-block;
    }

    .menu a {
        width: fit-content;
        padding: 0.5rem 1em;
        margin: 0 auto;
        font-weight: bold;
        display: block;
        padding: 0.5rem;
        transition: 0.3s;
    }

    .menu a:hover {
        background-color: var(--shadowgreen);
    }

    .desktop a {
        font-size: medium;
    }

    .nav-right {
        float: right;
    }
    .nav-right img {
        height: 1rem;
    }
    @media(max-width: 768px) {

        .menu {
            display: none;
        }
    }
</style>

<head>
    <script src="https://kit.fontawesome.com/e4a335c558.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="hamburgerMenu" class="hamburger-menu">
        <button onclick="showDropdown()" class="m-dropbtn">Menu</button>
        <div id="mobileDropdown" class="m-dropdown-content">
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <a href="history.php">Historia</a>
            <a href="classification.php">Klasyfikacja</a>
            <a href="quiz.php">Quiz</a>
            <a href="forum.php">Forum</a>
            <a href="database.php">Szukaj</a>
            <button onclick="showModal()" class="login-button"><img src="img/pfp/default-pfp.png"/> Login</button>
        </div>
    </div>
    <div class="menu">
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <ul class="desktop">
            <li><a href="history.php">Historia</a></li>
            <li><a href="classification.php">Klasyfikacja</a></li>
            <li><a href="quiz.php">Quiz</a></li>
            <li><a href="forum.php">Forum</a></li>
            <li><a href="database.php">Szukaj</a></li>
            <li class="nav-right">
                <?php
                if (!isset($_SESSION['login'])) {
                    echo '<a href="login_page.php" class="login-button"><i class="fas fa-user-circle"></i></a>';
                } else {
                    echo '<a href="#" onclick="showModal()" class="login-button"><img src="'. $_SESSION['pfp'] .'"/></a>';
                }
                ?>

            </li>
        </ul>
    </div>
</body>

</html>