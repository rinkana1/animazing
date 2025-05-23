<?php
    require_once("./db_connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["user-id"];
        
        $sql = "SELECT light_mode FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows() > 0) {
            $stmt->bind_result($is_light_mode);
            $stmt->fetch();

            if($is_light_mode == 1) {
                $sql = "UPDATE users SET light_mode = 0 WHERE id = ?";
            } else {
                $sql = "UPDATE users SET light_mode = 1 WHERE id = ?";
            }

            $stmt2 = $conn->prepare($sql);
            $stmt2->bind_param("s", $id);
            $stmt2->execute();

            $stmt->close();
            $stmt2->close();

            header("Location: ../pages/profile.php?id=$id");
        }
    }
?>