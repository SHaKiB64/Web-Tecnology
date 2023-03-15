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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$gender = $_POST["gender"];
	$dob = $_POST["dob"];

	// Load users data from JSON file
	$users = json_decode(file_get_contents("data.json"), true);

	// Find the current user in the data array
	$current_user = null;
	foreach ($users as &$user) {
		if ($user["username"] === $_SESSION["user"]) {
			$current_user = &$user;
			break;
		}
	}

	// Update the user information
	if ($current_user) {
		$current_user["name"] = $name;
		$current_user["e-mail"] = $email;
		$current_user["gender"] = $gender;
		$current_user["dob"] = $dob;

		// Save the updated users data to JSON file
		file_put_contents("data.json", json_encode($users));

		// Redirect to the dashboard page
		header("Location: dashboard.php");
		exit();
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
    <title>Edit Profile</title>
</head>

<body>
    <br><br><br>

    <div class="center">
        <p align="right">
            <a>Logged in as </a><a href=""><?php echo $_SESSION["user"]; ?> </a> |
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
                                Name:
                                <input type="text" name="name" value="<?php echo $Name; ?>"><br><br>
                                Email:
                                <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
                                Gender:
                                <input type="radio" name="gender" value="Female"<?php if (isset($user['gender']) && $user['gender'] == "Female") echo "checked";?>>Female
                                <input type="radio" name="gender" value="Male" <?php if (isset($user['gender']) && $user['gender'] == "Male") echo "checked";?>>Male
                                <input type="radio" name="gender" value="Other"<?php if (isset($user['gender']) && $user['gender'] == "Other") echo "checked";?>>Other
                                <br><br>
                                DOB:
                                <input type="date" name="dob" value="<?php echo $Dob; ?>"><br><br>
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