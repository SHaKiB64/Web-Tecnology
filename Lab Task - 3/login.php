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
			if ($remember_me) {
				setcookie("username", $user["username"], time() + (86400 * 30), "/");
			}
			header("Location: profilepicture.php");
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
		<?php if (isset($error_message)) { ?>
			<p><?php echo $error_message; ?></p>
		<?php } ?>

		<form action="profilepicture.php" method="post">
			<fieldset>
				<legend>LOGIN</legend>
				<label>User Name:</label>
				<input style="background-color: <?php if (isset($_COOKIE['color'])) {
													echo $_COOKIE['color'];
												} ?>" type="text" name="uname" value="<?php if (isset($_COOKIE['username'])) {
																							echo $_COOKIE['username'];
																						} ?>"><br><br>
				<label>Password:</label>
				<input type="password" name="password" value="<?php if (isset($_COOKIE['password'])) {
																echo $_COOKIE['password'];
															} ?>"><br>
				<hr>
				<input type="checkbox" name="rme" <?php if (isset($_COOKIE['username'])) {
														echo "checked";
													} ?>>&nbsp;<label for="rme">Remember Me</label><br><br>
				<input type="submit" name="login" value="Login">&nbsp;
				<a href="forgotpass.php">Forgot Password ?</a>
			</fieldset>
		</form>
	</div>

</body>

</html>