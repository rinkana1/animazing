<?php
    require_once("./db_connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value = trim($_POST["bio-content"]);
        $id = $_POST["user-id"];
        
        if($value == "") {
            $sql = "UPDATE users SET bio = NULL WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $id);
        } else {
            $sql = "UPDATE users SET bio = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $value, $id);
        }
        $stmt->execute();

        header("Location: ../pages/profile.php?id=$id");
    }
?>