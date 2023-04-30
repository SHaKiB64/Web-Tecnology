<?php
require_once '../model/db_connect.php';
session_start();

// Fetch all users from the database
$conn = db_conn();
$selectQuery = "SELECT * FROM usertbl";
$stmt = $conn->prepare($selectQuery);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conn = null;

// require_once '../controller/userInfo.php';
// $user = fetchAllUsers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>

    <title>ALL USERS</title>
</head>

<body>
    <div class="container">
        <h3>All Users</h3>
        <p>Suggestions: <span id="txtHint"></span></p>
        Search: <input type="text" name="searchuser" onkeyup="showHint(this.value)"><br><br>

        <!-- <script>
            function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById("txtHint").innerHTML =
                        this.responseText;
                }
                xhttp.open("GET", $user['Name'] + str);
                xhttp.send();
            }
        </script> -->



        <table id="customers">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><a href=""><?php echo $user['Name'] ?></a></td>
                        <td><?php echo $user['Email'] ?></td>
                        <td><?php echo $user['Phone'] ?></td>
                        <td><?php echo $user['Gender'] ?></td>
                        <td><?php echo $user['Dob'] ?></td>
                        <td><img width="100px" src="../uploads/" <?php echo $user['Image'] ?>" alt="<?php echo $user['Name'] ?>"></td>
                        <td><a href="editprofile.php?id=<?php echo $user['ID'] ?>">Edit</a>&nbsp<a href="controller/deleteStudent.php?id=<?php echo $user['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>