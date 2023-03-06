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
            width: 40%;
            border: 5px solid #73AD21;
            padding: 20px;
        }
    </style>
    <title>Change Password</title>
</head>

<body>
    <br><br><br>
    <div class="center">
        <form action="forgotpass.php" method="post">
            
            <fieldset>
                <legend><b>CHANGE PASSWORD</b></legend>
                <br>
                <label>Current Password:</label>
				<input type="password" name="cpass"><br><br>
                <label>New Password:</label>
				<input type="password" name="npass"><br><br>
                <label>Retype New Password:</label>
				<input type="password" name="rnpass"><br>
				<hr>
				<input type="submit" name="login" value="Submit">&nbsp;
				<a href="login.php">Login</a>
                
            </fieldset>



        </form>
    </div>

</body>

</html>