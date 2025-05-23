<?php
    require_once(__DIR__ . "/../php/db_connect.php");

        $id = $_COOKIE["user_id"];
        
        if ($id) {
            $sql = "SELECT light_mode FROM users WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows() > 0) {
                $stmt->bind_result($light_mode_check);
                $stmt->fetch();
                $stmt->close();
            }
        }      
?>