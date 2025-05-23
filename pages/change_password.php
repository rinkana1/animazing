<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniMazing | Change Password</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/signup_login.css">
</head>
<body>
    <?php
        session_start();
        $error = $_SESSION['error'] ?? '';
        $success = $_SESSION['success'] ?? '';
        unset($_SESSION['error'], $_SESSION['success']);
        if (!isset($_COOKIE['user_id'])) {
            header("Location: login_page.php");
            exit();
        }
    ?>

    <?php include './navbar.php'; ?>

    <div class="main-section signup-login">
        <h1>Change Your Password</h1>
        <form class="signup-form" action="../php/change_password.php" method="POST">
            <?php if ($error): ?>
                <p class="error-message"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <?php if ($success): ?>
                <p class="success-message"><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>

            <div>
                <label class="signup-label" for="current-password">Current Password</label>
                <input class="signup-input form-text-input" id="current-password" name="current_password" type="password" required>
            </div>

            <div>
                <label class="signup-label" for="new-password">New Password</label>
                <input class="signup-input form-text-input" id="new-password" name="new_password" type="password" required>
            </div>

            <div>
                <label class="signup-label" for="confirm-new-password">Confirm New Password</label>
                <input class="signup-input form-text-input" id="confirm-new-password" name="confirm_new_password" type="password" required>
            </div>

            <button class="form-submit" type="submit" disabled>Change Password</button>
        </form>
    </div>
    <script src="../js/change_password.js"></script>
</body>
</html>
