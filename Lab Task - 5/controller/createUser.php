<?php
session_start();
require_once '../model/model.php';
if (isset($_POST['signup'])) {
  $data['name'] = $_POST['name'];
  $data['email'] = $_POST['email'];
  $data['phone'] = $_POST['phone'];
  $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);
  $data['gender'] = $_POST['gender'];
  $data['dob'] = $_POST['dob'];
  $data['image'] = basename($_FILES["image"]["name"]);


  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);

  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
    echo "<br>";
  } else {
    echo "Sorry, there was an error uploading your file.";
    echo "<br>";
  }
  if (addUser($data)) {
    echo 'Successfully added!!';
    echo "<br>";
    echo 'now <a href="../view/login.php">Sign In</a>';
  } else {
    echo 'You are not allowed to access this page.';
  }
}