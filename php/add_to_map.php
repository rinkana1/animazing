<?php
    require_once("./db_connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_POST["user-id"];
        $content_id = $_POST["content-id"];
        $redirect = $_POST["redirect-to"];
        $query = $_POST["search-query"] ?? "";

        $sql = "INSERT INTO map (content_id, user_id)
                VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $content_id, $user_id);
        $stmt->execute();

        $stmt->close();

        if ($redirect == "maze") {
            header("Location: ../pages/maze.php?query=$query");
        } else if ($redirect == "content") {
            header("Location: ../pages/content.php?id=$content_id");
        } else {
            header("Location: /animazing/");
        }
        
    }

?>