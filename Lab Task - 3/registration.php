<?php
$message = '';
$error = '';
if (isset($_POST["submit"])) {
  if (empty($_POST["name"])) {
    $error = "<label>Enter Name</label>";
  } else if (empty($_POST["email"])) {
    $error = "<label>Enter an e-mail</label>";
  } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $error = "<label>Invalid email format</label>";
  } else if (empty($_POST["uname"])) {
    $error = "<label>Enter a username</label>";
  } else if (!preg_match('/^[a-zA-Z0-9\.\-_]{2,}$/', $_POST["uname"])) {
    $error = "<label>User Name must contain at least two (2) characters</label>";
  } else if (empty($_POST["password"])) {
    $error = "<label >Enter a password</label>";
  } else if (strlen($_POST["password"]) < 8 && !preg_match('/[@#$%]/', $_POST["password"])) {
    $error = "<label>Invalid Password</label>";
  } else if (empty($_POST["cpassword"])) {
    $error = "<label>Confirm password field cannot be empty</label>";
  } else if ($_POST["password"]!== $_POST["cpassword"]) {
    $error = "<label>Password do not match</label>";
  } else if (empty($_POST["gender"])) {
    $error = "<label>Gender cannot be empty</label>";
  } else if (empty($_POST["dob"])) {
    $error = "<label>Date of Birth cannot be empty</label>";
  } else {
    if (file_exists('data.json')) {
      $current_data = file_get_contents('data.json');
      $array_data = json_decode($current_data, true);
      $new_data = array(
        'name'               =>     $_POST["name"],
        'e-mail'          =>     $_POST["email"],
        'username'     =>     $_POST["uname"],
        'password'     =>     $_POST["password"],
        'username'     =>     $_POST["uname"],
        'gender'     =>     $_POST["gender"],
        'dob'     =>     $_POST["dob"]
      );
      $array_data[] = $new_data;
      $final_data = json_encode($array_data);
      if (file_put_contents('data.json', $final_data)) {
        $message = "<label>File Appended Success fully</p>";
      }
    } else {
      $error = 'JSON File not exits';
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
      width: 45%;
      border: 5px solid #73AD21;
      padding: 20px;
    }
  </style>
  <title>Registration</title>
</head>

<body>
  <br><br><br>
  <div class="center">
    <form method="post">
      <?php
      if (isset($error)) {
        echo $error;
      }
      ?><br>
      <label> Name:</label>
      <input type="text" name="name"><br><br>
      <label>Email:</label>
      <input type="text" name="email"><span><b>&nbsp;i</b></span><br><br>
      <label>User Name:</label>
      <input type="text" name="uname"><br><br>
      <label>Password:</label>
      <input type="password" name="password"><br><br>
      <label>Confirm Password:</label>
      <input type="password" name="cpassword"></span><br><br>
      <fieldset>
        <legend>Gender</legend>
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Other">Other
      </fieldset>
      <fieldset>
        <legend>Date of Birth</legend>
        <input type="date" name="dob">
      </fieldset>
      <hr>
      <input type="submit" name="submit">
      <input type="reset" name="reset">&nbsp;<a href="login.php">Login</a>
      <br>
      <?php
      if (strlen($message) > 0) {
        header("Location:login.php");
      }
      ?>
    </form>

  </div>
</body>

</html>