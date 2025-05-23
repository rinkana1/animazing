<?php
    require_once("./db_connect.php");

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        
        $_SESSION['form_data'] = [
            'email' => $email,
            'username' => $username
        ];

        // Check email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email format.";
            $_SESSION['form_data'] = $_POST;
            header("Location: ../pages/signup.php");
            exit();
        }

        // Check if email or username already exists
        $checkSql = 'SELECT id from users WHERE email = ? OR username = ?';
        $stmt = $conn->prepare($checkSql);
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['error'] = "Email or username already exists.";
            header("Location: ../pages/signup.php");
            exit();
        }

        $stmt->close();

        // Insert into DB
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful!";
            header("Location: ../pages/login_page.php");
        } else {
            $_SESSION['error'] = "Database error: " . $stmt->error;
            header("Location: ../pages/signup_page.php");
        }
        $stmt->close();
    }
    $conn->close();
?>
