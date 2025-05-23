<?php
    require_once("./db_connect.php");
    
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $_SESSION['form_data'] = [
            'email' => $email
        ];

        $sql = "SELECT id, password, light_mode FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password, $light_mode);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['success'] = "Login successful!";
                setcookie("user_id", $id, time() + (60 * 30), "/");
                $stmt->close();

                $sql = "UPDATE users SET last_online = CURRENT_TIMESTAMP WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();

                header("Location: ../index.php");
            } else {
                $_SESSION['error'] = "Invalid credentials.";
                header("Location: ../pages/login_page.php");
            }
        } else {
            $_SESSION['error'] = "No account found with that email.";
            header("Location: ../pages/login_page.php");
        }
    }
?>
