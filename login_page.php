<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Logowanie</title>
	<style>
		body {
			text-align: center;
		}

		.panels input {
			padding: 0.5rem;
			font-size: large;
			margin: 0.25rem;
			outline: none;
		}

		.panels .btn,
		#change-logreg-button {
			border: none;
			border-radius: 8px;
			padding: 0.3rem;
			cursor: pointer;
			background-color: #95b2d4;
		}

		.error {
			color: red;
		}
	</style>
</head>

<body>

	<div class="panels">
		<div id="login-panel">
			<form action="user/login.php" method="POST">
				<input type="text" name="login" placeholder="Login" required> <br>
				<input type="password" name="password" placeholder="Hasło" required> <br>
				<input class="btn" type="submit" value="Zaloguj">
			</form>
			<div class="error">
				<?php
				$error = $_GET["error"] ?? null;
				if ($error == 1) {
					echo "Login lub hasło są nieprawidłowe";
				}
				?>
			</div>
		</div>
		<br>
		<div id="register-panel">
			<form action="user/register.php" method="POST">
				<input type="text" name="login" placeholder="Login" required> <br>
				<input type="password" name="password" placeholder="Hasło" required> <br>
				<input type="password" name="password_repeat" placeholder="Powtórz hasło" required> <br>
				<input type="checkbox" name="newsletter" checked> Sign up for the newsletter? <br>
				<input class="btn" type="submit" value="Zarejestruj">
			</form>
			<div class="error">
				<?php
				$error = $_GET["error"] ?? null;
				if ($error == 2) {
					echo "Użytkownik o podanej nazwie już istnieje";
				}
				if ($error == 3) {
					echo "Hasła się nie zgadzają";
				}
				?>
			</div>
		</div>
		<a href="index.php">Wróć</a>
	</div>

</body>

</html>