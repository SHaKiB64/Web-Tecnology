<!DOCTYPE html>
<html>
  <head>
    <title>Lab Task</title>
  </head>
  <body>
    <?php
    $fname=$lname=$dob=$gender=$degree=$university=$crc="";
    $degrees = (isset($_POST['degree'])) ? $_POST['degree'] : array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        if (count($degrees) > 1) {

          $degree = $_POST["degree"];
        }
        $university = $_POST["university"];
        $crc = $_POST["crc"];
    }

    ?>
    <h2>About Me</h2>
    <form action="labtask1.php" method="post">
      First Name: 
      <input type="text" name="fname"><br><br>
      Last Name: 
      <input type="text" name="lname"><br><br>
      Date of Birth: 
      <input type="date" name="dob"><br><br>
      Gender:
      <input type="radio" name="gender" value="Male">Male
      <input type="radio" name="gender" value="Female">Female
      <input type="radio" name="gender" value="Other">Other
      <br><br>
      Degree:
      <input type="checkbox" name="degree[]" value="SSC">SSC
      <input type="checkbox" name="degree[]" value="HSC">HSC
      <input type="checkbox" name="degree[]" value="BSc">BSc
      <br><br>
      University:
      <select name="university">
      <option value=""></option> 
      <option value="AIUB">AIUB</option> 
      <option value="NSU">NSU</option> 
      <option value="BrRAC">BRAC</option> 
      <option value="IUB">IUB</option> 
      </select>
      <br><br>
      Credit Complete:
      <input type="number" name="crc">
      <br><br>
      <input type="submit" />
    </form>
    <h3>Your Input</h3>
    <?php
    echo $fname;
    echo " ";
    echo $lname;
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
    echo $university;
    echo "<br>";
    echo $crc;

    ?>
  </body>
</html>
