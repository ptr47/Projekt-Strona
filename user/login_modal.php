<html>
    <?php 
    include("../session.php");
    echo 'Login: ';
    echo $_SESSION["login"];
    ?>
    <br>
    <br>
    <a href="user/logout.php">Wyloguj</a>
</html>