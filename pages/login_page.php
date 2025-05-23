<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AniMazing | Log In</title>

        <!-- CSS Imports -->
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/signup_login.css">
    </head>
    <body>
        <?php
            session_start();
            $error = $_SESSION['error'] ?? '';
            $form_data = $_SESSION['form_data'] ?? [];
            unset($_SESSION['error'], $_SESSION['form_data']);
        ?>
        
        <?php include './navbar.php'; ?>

        <div class="main-section signup-login">
            <h1>Enter the Maze...</h1>
            <form class="login-form" action="/animazing/php/login.php" method="POST">
                <div>
                    <label class="login-label" for="input.login-input#email">Email</label>
                    <input class="login-input form-text-input" id="email" name="email" type="email" required>
                    <?php if ($error): ?>
                        <p class="error-message" id="wrong-creds">Invalid credentials! Please try again.</p>
                    <?php endif; ?>
                </div>
                
                <div>
                    <label class="login-label" for="input.login-input#password">Password</label>
                    <input class="login-input form-text-input" id="password" name="password" type="password" required>
                    <a class="forgot-pw" href="">Forgot password?</a>
                </div>

                <button class="form-submit" type="submit">Log In</button>
    </body>
</html>