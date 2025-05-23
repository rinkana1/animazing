<?php
    require_once("./db_connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value = $_POST["rating-value"];
        $user_id = $_POST["user-id"];
        $content_id = $_POST["content-id"];
        
        if($value == "") {
            $sql = "UPDATE map
                    SET rating = NULL
                    WHERE content_id = ? AND user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $content_id, $user_id);
        } else {
            $sql = "UPDATE map
                    SET rating = ?
                    WHERE content_id = ? AND user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $value, $content_id, $user_id);
        }
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

        header("Location: ../pages/content.php?id=$content_id");
    }
?>