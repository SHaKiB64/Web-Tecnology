<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/style.css">
    <title>User DashBoard</title>
</head>

<body>
    <header>
        <h2 class="logo"><b>6t4</b></h2>
        <nav class="navigation">
            <a href="#" class="active">Home</a>
            <a href="#">Booking History</a>
            <a href="logout.php">LogOut</a>
            <a href="myprofile.php">Logged as <?php echo $_SESSION["name"];  ?></a>


        </nav>
    </header>

    <p><?php echo $user['Name']; ?></p>
</body>