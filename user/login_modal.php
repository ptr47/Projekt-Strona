<html>
<style>
    .user-panel {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
</style>
<div class="user-panel">
    <?php
    include("../session.php");
    echo 'Login: ';
    echo $_SESSION["login"];
    if ($_SESSION["login"] == "admin")
        echo '<a href="admin.php">Panel administracyjny</a>'
            ?>
        <a href="user_panel.php">Edytuj dane</a>
    <?php if ($_SESSION["login"] != "admin")
        echo '<a href="user/delete_acc.php">Usuń konto</a>'
            ?>
        <a href="user/logout.php">Wyloguj</a>
    </div>

    </html>