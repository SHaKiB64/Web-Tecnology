<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
  <title>Lab Task- 2</title>
</head>

<body>
  <?php
  $name = $email = $dob = $gender = $degree = $bgroup = "";
  $degrees = (isset($_POST['degree'])) ? $_POST['degree'] : array();
  $nameErr = $emailErr = $dobErr = $degreeErr = $genderErr = $bgroupErr = "";

  //Name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  //Email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  //Date of Birth

  if (empty($_POST["dob"])) {
    $dobErr = "Date of Birth is required";
  } else {
    if (!preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(19[5-9]\d|19[0-8]\d|1998)$/", $dob)){
      $dobErr = "Invalid date of birth";
    }
      $dob = $_POST["dob"];
  }

  //Gender
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }
  //Degree
  if (empty($_POST["degree"])) {
    $degreeErr = " No degrees has been selected!";
  } else {
    if (count($degrees) < 2) {
      $degreeErr = " At least two of them must be selected!";
    }else{
      $degree = $_POST["degree"];
    }
  }
  //Blood Groups
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["bgroup"])) {
      $bgroupErr = "Please select one!";
    } else {
      $bgroup = $_POST["bgroup"];
    }
  }
  ?>


  <form action="labtask2.php" method="post">
    Name: <input type="text" name="name">
    <span class="error">*
      <?php echo $nameErr; ?>
    </span>
    <br><br>
    E-mail: <input type="text" name="email">
    <span class="error">*
      <?php echo $emailErr; ?>
    </span>
    <br><br>
    Date of Birth: <input type="date" name="dob">
    <span class="error">*
      <?php echo $dobErr; ?>
    </span>
    <br><br>
    Gender:
    <br><br>
    <input type="radio" name="gender" value="Female">Female
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Other">Other
    <span class="error">*
      <?php echo $genderErr; ?>
    </span>
    <br><br>
    Degree:
    <br><br>
    <input type="checkbox" name="degree[]" value="SSC">SSC
    <input type="checkbox" name="degree[]" value="HSC">HSC
    <input type="checkbox" name="degree[]" value="BSc">BSc
    <input type="checkbox" name="degree[]" value="MSc">MSc
    <span class="error">
      <?php echo $degreeErr; ?>
    </span>
    <br><br>
    Blood Group:
    <br><br>
    <select name="bgroup" id="">
      <option value=""></option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="O+">O+</option>
    </select>
    <span class="error">
      <?php echo $bgroupErr; ?>
    </span>
    <br><br>
    <input type="submit">
  </form>
  <?php
  echo "<h2>Your Input</h2>";
  if (preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    echo $name;
  }
  echo "<br>";
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo $email;
  }
  echo "<br>";
  echo $dob;
  echo "<br>";
  echo $gender;
  echo "<br>";
  if (count($degrees) > 1) {
    foreach ($degrees as $degree) {
      echo $degree . ' ';
    }
  }
  echo "<br>";
  echo $bgroup;


  ?>
</body>

</html>