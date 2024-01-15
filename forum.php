<!DOCTYPE html>
<html lang="pl">

<?php
include("connect.php");
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
            <div class="post-container">
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
    <script src="scripts/comment.js"></script>
    <!--End of scripts-->
</body>

</html>