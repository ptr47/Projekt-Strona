<html>
<style>
 .user-panel{
    display: flex;
    flex-direction: column;
    gap: 10px;
 }
</style>
<div class="user-panel">
    <?php
    include("../session.php");
    echo 'Login: ';
    echo $_SESSION["login"];
    if($_SESSION["login"]=="admin")
    echo '<a href="user/admin.php">Panel administracyjny</a>'
    ?>
    <a href="user/logout.php">Wyloguj</a>
</div>

</html>