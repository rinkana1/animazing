<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AniMazing | Sign Up</title>

        <!-- CSS Imports -->
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/signup_login.css">
    </head>
    <body>
        <?php
            session_start();
            $error = $_SESSION['error'] ?? '';
            $success = $_SESSION['success'] ?? '';
            $form_data = $_SESSION['form_data'] ?? [];
            unset($_SESSION['error'], $_SESSION['success'], $_SESSION['form_data']);
        ?>
        <?php include './navbar.php'; ?>

        <div class="main-section signup-login">
            <h1>Join the Maze...</h1>
            <form class="signup-form" action="../php/signup.php" method="POST">
                <?php if ($error): ?>
                    <p class="error-message"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
                
                <div>
                    <label class="signup-label" for="input.signup-input#email">Email</label>
                    <input class="signup-input form-text-input" id="email" name="email" type="email" required>
                    <p class="error-message hidden" id="email-error">This email is already registered! Please try logging in.</p>
                </div>
                
                <div>
                    <label class="signup-label" for="input.signup-input#username">Username</label>
                    <input class="signup-input form-text-input" id="username" name="username" type="text" required>
                    <p class="error-message hidden" id="username-error">Username taken! Please choose a different username.</p>
                    <p class="error-message hidden" id="username-space-error">Username cannot contain spaces.</p>
                </div>
                
                <div>
                    <label class="signup-label" for="input.signup-input#password">Password</label>
                    <input class="signup-input form-text-input" id="password" name="password" type="password" required>
                    <div class="password-info hidden" id="password-info">
                        Password must have:
                        <ul>
                            <li class="pw-req not-met" id="eight-char">At least 8 characters</li>
                            <li class="pw-req not-met" id="uppercase">At least 1 uppercase character</li>
                            <li class="pw-req not-met" id="lowercase">At least 1 lowercase character</li>
                            <li class="pw-req not-met" id="number">At least 1 number</li>
                            <li class="pw-req not-met" id="special-char">At least 1 special character (1, @, #, etc.)</li>
                        </ul>
                    </div>
                </div>
                
                <div>
                    <label class="signup-label" for="input.signup-input#confirm-password">Confirm Password</label>
                    <input class="signup-input form-text-input" id="confirm-password" type="password" required>
                    <p class="error-message hidden" id="confirm-password-error">Passwords do not match! Please try again</p>
                </div>

                <button class="form-submit" id="form-submit" type="submit" disabled>Sign Up</button>
            </form>
        </div>
        <script src="../js/signup.js"></script>
    </body>
</html>