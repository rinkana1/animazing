<?php
require_once("./db_connect.php");
session_start();

if (!isset($_COOKIE['user_id'])) {
    header("Location: ../pages/login_page.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_COOKIE['user_id'];
    $current_password = trim($_POST['current_password']);
    $new_password = trim($_POST['new_password']);
    $confirm_new_password = trim($_POST['confirm_new_password']);

    if ($new_password !== $confirm_new_password) {
        $_SESSION['error'] = "New passwords do not match.";
        header("Location: ../pages/change_password.php");
        exit();
    }

    // Fetch current password hash
    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($current_password, $hashed_password)) {
        $_SESSION['error'] = "Current password is incorrect.";
        header("Location: ../pages/change_password.php");
        exit();
    }

    // Update password
    $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_hashed_password, $user_id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Password changed successfully.";



        $sql = "UPDATE users SET last_password_change = CURRENT_TIMESTAMP where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
    } else {
        $_SESSION['error'] = "Failed to update password. Please try again.";
    }

    $stmt->close();

    header("Location: ../pages/profile.php?id=$user_id");
    exit();
}
?>
