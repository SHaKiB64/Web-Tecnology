<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["uname"];
	$password = $_POST["password"];
	$remember_me = isset($_POST["rme"]);

	$users = json_decode(file_get_contents("data.json"), true);

	foreach ($users as $user) {
		if ($user["username"] === $username && $user["password"] === $password) {
			$_SESSION["user"] = $user["username"];
			$_SESSION["password"] = $user["password"];
			if ($remember_me) {
				setcookie("username", $user["username"], time() + 604800, "/");
				setcookie("password", $user["password"], time() + 604800, "/");
			} else {
				setcookie("username", "", time() - 3600, "/");
				setcookie("password", "", time() - 3600, "/");
			}
			header("Location: dashboard.php");
			exit();
		}
	}
	$error_message = "Invalid Username or Password";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		label {
			width: 30%;
			display: inline-block;
		}

		.center {
			margin: auto;
			width: 30%;
			border: 5px solid #73AD21;
			padding: 20px;
		}
	</style>
	<title>Login</title>
</head>

<body>
	<br><br><br>
	<div class="center">
		<p align="right">
			<a href="phome.php">Home</a> |
			<a href="login.php">Login</a> |
			<a href="registration.php">Registration</a>&nbsp;
		</p>

		<?php if (isset($error_message)) { ?>
			<p><?php echo $error_message; ?></p>
		<?php } ?>

		<form method="post">

			<fieldset>
				<legend>LOGIN</legend>
				<label>User Name:</label>
				<input type="text" name="uname" value="<?php if (isset($_COOKIE['username'])) {
															echo $_COOKIE['username'];
														} ?>"><br><br>
				<label>Password:</label>
				<input type="password" name="password" value="<?php if (isset($_COOKIE['password'])) {
																	echo $_COOKIE['password'];
																} ?>"><br>
				<hr>
				<input type="checkbox" name="rme">&nbsp;<label for="rme">Remember Me</label><br><br>
				<input type="submit" name="login" value="Login">&nbsp;
				<a href="forgotpass.php">Forgot Password ?</a>
			</fieldset>
		</form>
	</div>

</body>

</html>