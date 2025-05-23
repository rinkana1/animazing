<?php
    require_once("./db_connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_POST["user-id"];
        $content_id = $_POST["content-id"];
        $query = $_POST["search-query"] ?? "";
        $redirect = $_POST["redirect-to"];

        $sql = "DELETE FROM map
                WHERE content_id = ? AND user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $content_id, $user_id);
        $stmt->execute();

        $stmt->close();

        $sql = "UPDATE maze
                SET avg_rating = COALESCE((
                    SELECT AVG(m.rating)
                    FROM map m
                    WHERE m.content_id = maze.id
                ), 5)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $stmt->close();

        if($redirect == "maze") {
            header("Location: ../pages/maze.php?query=$query");
        } else if ($redirect == "map") {
            header("Location: ../pages/map.php?id=$user_id");
        } else if ($redirect == "content") {
            header("Location: ../pages/content.php?id=$content_id");
        } else {
            header("Location: /animazing/");
        }
        
    }

?>