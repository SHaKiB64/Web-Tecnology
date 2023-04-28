<?php
session_start();
if (isset($_POST['signin'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember_me = isset($_POST["r_me"]);

    require_once '../model/model.php';

    $user = getUserByEmail($email);

    if ($_POST['email']==$email && $_POST['password']==$password) {
        $_SESSION['email'] = $user['Email'];
        $_SESSION['password'] = $user['Password'];
        $_SESSION['name'] = $user['Name'];
        $_SESSION['phone'] = $user['Phone'];
        $_SESSION['gender'] = $user['Gender'];
        $_SESSION['dob'] = $user['Dob'];
        $_SESSION['image'] = $user['Image'];


        if ($remember_me) {
            setcookie("email", $user["Email"], time() + 604800, "/");
            setcookie("password", $user["Password"], time() + 604800, "/");
        } else {
            setcookie("email", "", time() - 604800, "/");
            setcookie("password", "", time() - 604800, "/");
        }
        header("Location: UserHome.php");
        exit();
    }
    $error_msg = 'Invaid Email or Password';
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>SignIN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="checkbox"] {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-top: 10px;
        }

        .btn-submit {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #3e8e41;
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
        }

        .signup-link a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 style="text-align: center;">SIGN IN</h2>
        <form method="POST" action="login.php">
            <div><?php echo $error_msg; ?></div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required value="<?php if (isset($_COOKIE['email'])) {
                                                                                echo $_COOKIE['email'];
                                                                            } ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required value="<?php if (isset($_COOKIE['password'])) {
                                                                                            echo $_COOKIE['password'];
                                                                                        } ?>">
            </div>
            <div class="form-group">
                <label for="r_me"><input type="checkbox" name="r_me" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>>Remember Me</label>
            </div>
            <a class="forgot-password" href="forgotpass.php">Forget Password?</a>
            <input class="btn-submit" type="submit" name="signin" value="Sign In">
        </form>
        <div class="signup-link">
            <p>Don't Have an Account ? <a href="registration.php">Sign Up</a></p>
        </div>
    </div>
</body>

</html>