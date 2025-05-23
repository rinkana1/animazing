<?php
    require_once("./db_connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["user-id"];

        if(!$_POST["email-content"]) {
            // TODO: Redirect to error page.
            $error = "Email cannot be empty! Please try again.";
        } else {
            $value = trim($_POST["email-content"]);

            $sql = "SELECT id FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $value);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0) {
                // TODO: Redirect to error page.
                $error = "Email is already in use! Please try again";
            } else {
                
                $sql = "UPDATE users SET email = ? WHERE id = ?";
                $stmt2 = $conn->prepare($sql);
                $stmt2->bind_param("ss", $value, $id);
                $stmt2->execute();

                $stmt->close();
                $stmt2->close();

                header("Location: ../pages/profile.php?id=$id");
            }
        }
    }
?>