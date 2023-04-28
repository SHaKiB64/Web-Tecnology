<?php
require_once '../model/model.php';


if (isset($_POST['editprofile'])) {
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    // $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);
    $data['gender'] = $_POST['gender'];
    $data['dob'] = $_POST['dob'];

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // $newFileName = uniqid() . '.' . $imageFileType;
    // $target_file = $target_dir . $newFileName;
    // move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    // $data['image'] = $newFileName;


    if (updateUser($_POST['id'], $data)) {
        //redirect to showStudent
        header('Location: ../view/myprofile.php?id=' . $_POST["id"]);
    }
} else {
    echo 'You are not allowed to access this page.';
}
