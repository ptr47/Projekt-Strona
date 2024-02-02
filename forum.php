<!DOCTYPE html>
<html lang="pl">

<?php
include("session.php");

if (!isset($_SESSION['login'])) {
    header("location: login_page.php");
    die();
}
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum</title>
    <link rel="stylesheet" href="resource/main.css" />
    <link rel="stylesheet" href="resource/mobile.css" />
    <link rel="stylesheet" href="resource/forum.css" />
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
            <div id="addpost">
                <form action="process_post.php" method="post">
                    Tytuł<br>
                    <input type="text" id="title" name="title" maxlength="50" required><br>
                    Treść<br>
                    <textarea id="content" name="content" maxlength="1000" required></textarea><br>

                    <input type="submit" value="Zamieść">
                </form>
            </div>
            <?php
            $postQuery = "SELECT * FROM posts";
            $result = $connection->query($postQuery);

            while ($post = $result->fetch_assoc()) {
                $postId = $post['id'];
                $commentResult = $connection->query("SELECT * FROM comments WHERE post_id = $postId");
                $username = $post['user_id'];
                $userResult = $connection->query("SELECT user FROM users WHERE id= $username");
                $username = "[Deleted]";
                if ($userResult) {
                    $userData = $userResult->fetch_row();
                    if ($userData)
                        $username = $userData[0];
                }
                echo '<div class="post-container">';
                echo '<table class="post">
                <tr>
                    <th class="post-user" rowspan="2">
                    <table>
                        <tr><td>' . $username . '</td></tr>
                        <tr><td>' . $post['data'] . '</td></tr>
                    </table>
                    </th>
                    <th class="post-title">' . $post['title'] . '</th>
                </tr>
                <tr><td colspan="2"><p>' . $post['tresc'] . '</p></td></tr>';
                if ($_SESSION['login'] == 'admin' || $_SESSION['login'] == $username) {
                    echo '<td style="width: 5%;">';
                    echo '<form action="user/delete_comment.php" method="post">';
                    echo '<input type="hidden" name="post" value="'.$post['id'].'">';
                    echo '<input class="delete-button" type="submit" value="Delete"></form></td>';
                }
                echo '</table>';
                $userResult->free_result();
                echo '<div class="comments">';
                while ($comment = $commentResult->fetch_assoc()) {
                    $username = $comment['user_id'];
                    $userResult = $connection->query("SELECT user FROM users WHERE id= $username");
                    $username = "[Deleted]";
                    if ($userResult) {
                        $userData = $userResult->fetch_row();
                        if ($userData)
                            $username = $userData[0];
                    }
                    echo '<table class="comment">
                    <tr>
                        <td style="width: 10%;">' . $username . '</td>
                        <td style="width: 20%;">' . $comment['data'] . '</td>
                        <td>' . $comment['tresc'] . '</td>';
                    if ($_SESSION['login'] == 'admin' || $_SESSION['login'] == $username) {
                        echo '<td style="width: 5%;">';
                        echo '<form action="user/delete_comment.php" method="post" style="display:inline;">';
                        echo '<input type="hidden" name="comment" value="'.$comment['id'].'">';
                        echo '<input class="delete-button" type="submit" value="Delete"></form></td>';
                    }
                    echo '</tr>
                    </table>';
                    $userResult->free_result();
                }
                echo
                    '<div class="addcomment">
                        <form action="process_comm.php" method="post">
                            <input type="hidden" name="post" value="' . $postId . '">
                            <input type="text" name="content" required>
                            <input type="submit" value="Dodaj komentarz">
                        </form>
                    </div>
                </div>
                </div>';
            }
            $result->free_result();
            ?>
            <!-- <div class="post-container">
                <table class="post" onclick="toggleComments(event)">
                    <tr>
                        <th class="post-user" rowspan="2">
                            <table>
                                <tr>
                                    <td>Admin</td>
                                </tr>
                                <tr>
                                    <td>01.01.1999 12:00</td>
                                </tr>
                            </table>
                        </th>
                        <th class="post-title">Test post</th>
                    </tr>
                    <tr>
                        <td>To jest testowy post</td>
                    </tr>
                </table>
                <table class="comment">
                    <tr>
                        <td style="width: 10%;">Admin</td>
                        <td style="width: 20%;">01.01.1999 12:00</td>
                        <td>To jest komentarz</td>
                    </tr>
                </table>
                <table class="comment">
                    <tr>
                        <td style="width: 10%;">Admin</td>
                        <td style="width: 20%;">01.01.1999 12:00</td>
                        <td>To jest komentarz</td>
                    </tr>
                </table>
                <table class="comment">
                    <tr>
                        <td style="width: 10%;">Admin</td>
                        <td style="width: 20%;">01.01.1999 12:00</td>
                        <td>To jest komentarz</td>
                    </tr>
                </table>
            </div>
            <div class="post-container">
                <table class="post" onclick="toggleComments(event)">
                    <tr>
                        <th class="post-user" rowspan="2">
                            <table>
                                <tr>
                                    <td>Admin</td>
                                </tr>
                                <tr>
                                    <td>01.01.1999 13:00</td>
                                </tr>
                            </table>
                        </th>
                        <th class="post-title">Test post 2</th>
                    </tr>
                    <tr>
                        <td>To jest testowy post numer 2</td>
                    </tr>
                </table>
                <table class="comment">
                    <tr>
                        <td style="width: 10%;">Admin</td>
                        <td style="width: 20%;">01.01.1999 12:00</td>
                        <td>To jest komentarz</td>
                    </tr>
                </table>
                <table class="comment">
                    <tr>
                        <td style="width: 10%;">Admin</td>
                        <td style="width: 20%;">01.01.1999 12:00</td>
                        <td>To jest komentarz</td>
                    </tr>
                </table>
            </div> -->
        </main>
        <footer>
            <!-- footer.html -->
        </footer>
    </div>
    <!--Scripts below-->
    <script src="scripts/load.js"></script>
    <script src="scripts/dropdownMenu.js"></script>
    <script src="scripts/modal-login.js"></script>
    <!--<script src="scripts/comment.js"></script>-->
    <!--End of scripts-->
</body>

</html>