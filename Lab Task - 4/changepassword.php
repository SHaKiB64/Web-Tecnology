<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cpassword = $_POST["cpassword"];
        $npassword = $_POST["npassword"];
        $rtpassword = $_POST["rtpassword"];
    
        $users = json_decode(file_get_contents("data.json"), true);
    
        foreach ($users as &$user) {
            if ($user["username"] === $_SESSION["user"] && $user["password"] === $cpassword) {
                $user["password"] = $rtpassword;
                file_put_contents("data.json", json_encode($users));
                header("Location: dashboard.php");
                exit();
            }
        }
    
        $error_message = "Invalid Current Password";
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
            width: 60%;
            border: 5px solid #73AD21;
            padding: 20px;
        }

        /* Add styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            padding: 10px;
            border: 1px solid black;
        }

        .divider-vertical {
            border-left: 1px solid black;
            height: 100%;
            margin: 0 10px;
        }
    </style>
    <title>Change Password</title>
</head>

<body>
    <br><br><br>

    <div class="center">
        <p align="right">
            <a>Logged in as </a><a href=""><?php
                                            echo $_SESSION["user"];
                                            ?> </a> |
            <a href="logout.php">Logout</a>&nbsp;
        </p>

        <!-- Create the table -->
        <table>
            <tr>
                <td>
                    <form method="post">
                        <h3><u>Account</u></h3>
                        <ul>
                            <li> <a href="dashboard.php">DashBoard</a></li>
                            <li> <a href="viewprofile.php">View Profile</a></li>
                            <li> <a href="editprofile.php">Edit Profile</a></li>
                            <li> <a href="changeprofilepicture.php">Change Profile Picture</a></li>
                            <li> <a href="changepassword.php">Change Password</a></li>
                            <li> <a href="logout.php">Logout</a></li>
                        </ul>
                        <!-- Add your first column content here -->
                    </form>
                </td>
                <td>
                    <form method="post">
                        <fieldset>
                            <legend><b>PROFILE</b></legend>
                            <form action="" method="post">
                                <label> Current Password:</label>
                                <input type="password" name="cpassword"><br><br>
                                <label>New Password:</label>
                                <input type="password" name="npassword"><br><br>
                                <label>Re-type Password:</label>
                                <input type="password" name="rtpassword"><br><br>
                                <input type="submit" name="submit" value="Submit">




                            </form>

                        </fieldset>
                    </form>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>