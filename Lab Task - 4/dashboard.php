<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
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
    <title>DashBoard</title>
</head>

<body>
    <br><br><br>

    <div class="center">
        <p align="right">
            <a>Logged in as </a><a href="viewprofile.php"><?php
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
                        <h2 align="center">Welcome, <?php echo $_SESSION['user']; ?></h2>
                        <!-- Add your second column content here -->
                    </form>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
