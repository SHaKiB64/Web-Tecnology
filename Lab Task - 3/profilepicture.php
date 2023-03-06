<?php 

	if (!empty($_POST['rme'])) {
		setcookie("username", $_POST['uname'], time()+10);
		setcookie("password", $_POST['password'], time()+10);
		setcookie("color", "red", time()+10);
	}else{
		setcookie("username", "");
		setcookie("password", "");
	}

 ?>
 <br>
 

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
  <title>Profile Picture Upload</title>
</head>

<body>
  <div>
    <br><br><br>
    <form action="upload.php" method="post">
      <div class="center">
        <fieldset>
        <a href="login.php">Go back to login</a>

          <legend><b>PROFILE PICTURE</b></legend>
          <i class="glyphicon glyphicon-user"style="font-size:48px";></i>
          <input type="file" name="file" />
          <hr>
          <input type="submit" value="Submit" />
        </fieldset>
      </div>
    </form>
  </div>
  </div>

</body>

</html>