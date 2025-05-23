<?php
    require_once(__DIR__ . "/../php/db_connect.php");

    $id = $_POST["user-id"];

    $sql = "SELECT profile_picture FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows() > 0) {
        $stmt->bind_result($file_name);
        $stmt->fetch();

        $file_path = __DIR__ . "/../static/profiles/" . $file_name;


        if (file_exists($file_path)) {
            unlink($file_path);
        } else {
            echo "Error deleted the file.";
        }
    }

    $sql = "UPDATE users SET profile_picture = NULL WHERE id = ?";
    $stmt2 = $conn->prepare($sql);
    $stmt2->bind_param("s", $id);
    $stmt2->execute();
    
    $stmt->close();
    $stmt2->close();

    header("Location: ../pages/profile.php?id=$id");
?>