<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$users = json_decode(file_get_contents("data.json"), true);

foreach ($users as $user) {
    if ($user["username"] === $_SESSION["user"] && $user["password"] === $_SESSION["password"]) {
        $Name = $user["name"];
        $email = $user["e-mail"];
        $Gender = $user["gender"];
        $Dob = $user["dob"];
        break;
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
    <title>View Profile</title>
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
                                <p><b>Name:</b> <u><?php echo $Name; ?></u></p>
                                <p><b>Email:</b> <u><?php echo $email; ?></u></p>
                                <p><b>Gender:</b> <u><?php echo $Gender ?></u></p>
                                <p><b>DOB:</b> <u><?php echo $Dob; ?></u></p>
                                <img src="<?php echo $image_path; ?>" alt="My Image">&nbsp;<a href="changeprofilepicture.php"><u>Change</u></a>
                                <br><br>
                                <a href="editprofile.php"><u>Edit Profile</u></a>



                            </form>

                        </fieldset>
                    </form>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>