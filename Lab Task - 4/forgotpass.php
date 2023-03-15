<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $users = json_decode(file_get_contents("data.json"), true);

    foreach ($users as $user) {
        if ($user["e-mail"] === $email) {
            $message = "A password reset link will be sent to your email address shortly.";
            break;
        } else {
            $message = "Email not found in our database.";
        }
    }
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
    <title>Forgot Password</title>
</head>

<body>
    <br><br><br>
    
    <div class="center">
    <p align="right">
                <a href="Phome.php">Home</a> |
                <a href="login.php">Login</a> |
                <a href="registration.php">Registration</a>&nbsp;
            </p>
        <?php if (isset($message)) { ?>
            <p><?php echo $message; ?></p>
        <?php } ?>

        <form method="post">
            <fieldset>
                <legend>FORGOT PASSWORD</legend>
                <label>Email:</label>
                <input type="textbox" name="email" required><br><br>
                <input type="submit" name="submit" value="Submit">
            </fieldset>
        </form>
    </div>

</body>

</html>
