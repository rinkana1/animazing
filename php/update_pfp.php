<?php

require_once(__DIR__ . "/../php/db_connect.php");

$id = $_POST["user-id"];


$current_time = time();
$target_dir = __DIR__ . "/../static/profiles/";
$file = $current_time . "_" . basename($_FILES["uploaded-picture"]["name"]);
$target_file = $target_dir . $file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["uploaded-picture"]["tmp_name"]);
    if($check == false) {
        $error = "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    $error = "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["uploaded-picture"]["size"] > 2000000) {
    $error = "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    die("Sorry, your file was not uploaded. " . $error);
} else {
    if (move_uploaded_file($_FILES["uploaded-picture"]["tmp_name"], $target_file)) {
        $sql = "UPDATE users SET profile_picture = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $file, $id);
        $stmt->execute();

        header("Location: ../pages/profile.php?id=$id");
    } else {
        $error = "Sorry, there was an error uploading you file.";
    }
}
?>