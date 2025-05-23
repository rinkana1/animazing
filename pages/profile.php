<!DOCTYPE html>
<?php
    require_once(__DIR__ . "/../php/db_connect.php");

    if($_COOKIE["user_id"]) {
        include(__DIR__ . "/../php/get_light_mode.php");
    }

    if (!$_GET['id']) {
        $error = "Something went wrong :(";
    }

    $sql = "SELECT username, email, display_name, bio, profile_picture, light_mode, created_at, last_password_change, last_online FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_GET["id"]);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result(
            $user,
            $email,
            $profile_display_name,
            $bio,
            $profile_picture,
            $light_mode,
            $created_at,
            $last_password_change,
            $last_online
        );
        $stmt->fetch();
        
        if (!$bio) {
            $bio = "No bio set.";
        }
        
        if (!$profile_picture) {
            $profile_picture = "default.png";
        }

        if ($light_mode == 1) {
            $light_mode = "True";
        } else {
            $light_mode = "False";
        }
    } else {
        $error = "User not found :(";
    }
    $stmt->close();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AniMazing | <?= $profile_display_name ?? $user ?></title>

        <!-- CSS Imports -->
        <link rel="stylesheet" href="/animazing/css/reset.css">
        <link rel="stylesheet" href="/animazing/css/style.css">
        <link rel="stylesheet" href="/animazing/css/profile.css">

        <?php if($light_mode_check): ?>
            <script src="/animazing/js/set_light_mode.js"></script>
        <?php endif; ?>

    </head>
    <body>
        <?php include './navbar.php'; ?>
        
        <div class="sidebar">
            <img class="profile-picture" src="/animazing/static/profiles/<?= $profile_picture; ?>" alt="">
            <?php if($_COOKIE["user_id"] == $_GET["id"]): ?>
                <div class="pfp-edit">
                    <?php if($profile_picture !== "default.png"): ?>
                        <button class="" id="pfp-edit-btn">Change Image</button>
                        <form class="" id="pfp-remove-form" action="/animazing/php/remove_pfp.php" method="POST">
                            <input name="user-id" type="hidden" value="<?= $_GET["id"] ?>">
                            <button type="submit">Remove Image</button>
                        </form>
                    <?php else: ?>
                        <button class="center" id="pfp-edit-btn">Change Image</button>
                    <?php endif; ?>
                    <form class="pfp-edit-form hidden" id="pfp-edit-form" action="/animazing/php/update_pfp.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user-id" value="<?= $_GET["id"] ?>">
                        <input type="file" name="uploaded-picture" class="pfp-upload" id="pfp-upload">
                        <button type="submit">Upload File</button>
                        <button id="pfp-cancel-btn" type="reset">Cancel</button>
                    </form>
                </div><br>
            <?php endif; ?>

            <h2><?= $profile_display_name ?? $user ?></h2>
            <p class="username">@<?= $user ?></p><br>

            <div class="">
                <!-- TODO: Add last_online column to database -->
                <p><strong>Last Online: </strong><?= $last_online ?></p>
                <p><strong>Joined: </strong><?= $created_at ?></p><br>

                <a href="/animazing/pages/map.php?id=<?= $_GET['id'] ?>"><button class="user-map-button center"><strong><?= $profile_display_name ?? $user ?>'s Map</strong></button></a>
                
            </div>

            <?php if($_COOKIE["user_id"] == $_GET['id']): ?>
                <div class="log-out">
                    <a href="/animazing/php/logout.php"><button class="log-out-button center">Log Out</button></a>
                </div>
            <?php endif; ?>
        </div>

        <div class="main-section">

            <div class="bio">
                <h2><?= $profile_display_name ?? $user ?>'s Bio: </h2><br>
                <form name="set-bio-form" action="/animazing/php/set_bio.php" method="POST">
                    <input name="user-id" type="hidden" value=<?= $_GET["id"] ?>>
                    <textarea name="bio-content" class="bio-content" id="bio-content" readonly><?= htmlspecialchars($bio) ?></textarea><br>
                    <button class="hidden" id="bio-set-btn" type="submit">Confirm</button>
                    <?php if($_COOKIE["user_id"] == $_GET["id"]): ?>
                        <button id="bio-edit-btn" type="button">Edit...</button>
                        <button class="hidden" id="bio-cancel-btn" type="reset">Cancel</button>
                    <?php endif; ?>
                </form>
                
            </div>

            <?php if(isset($_COOKIE["user_id"])): ?>
                <?php if($_COOKIE["user_id"] == $_GET['id']): ?>
                    <div class="settings">
                        <table>
                            <tr>
                                <th colspan="3">User Settings</th>
                            </tr>
                            <tr>
                                <form action="/animazing/php/set_displayname.php" method="POST">
                                    <td><strong>Display Name</strong></td>
                                    <td><input name="displayname-content" id="displayname-content" value="<?= $profile_display_name ?? "---" ?>" readonly></td>
                                    <td>
                                        <input name="user-id" type="hidden" value=<?= $_GET["id"] ?>>
                                        <button class="hidden" id="displayname-set-btn" type="submit">Set</button>
                                        <button id="displayname-edit-btn" type="button">Edit...</button>
                                        <button class="hidden" id="displayname-cancel-btn" type="reset">Cancel</button>                                        
                                    </td>
                                </form>
                            </tr>
                            <tr>
                                <form action="/animazing/php/set_username.php" method="POST">
                                    <td><strong>Username</strong></td>
                                    <td><input name="username-content" id="username-content" value=<?= $username ?> readonly></td>
                                    <td>
                                        <input name="user-id" type="hidden" value=<?= $_GET["id"] ?>>
                                        <button class="hidden" id="username-set-btn" type="submit">Set</button>
                                        <button id="username-edit-btn" type="button">Edit...</button>
                                        <button class="hidden" id="username-cancel-btn" type="reset">Cancel</button>                                        
                                    </td>
                                </form>
                            </tr>
                            <tr>
                                <form action="/animazing/php/set_email.php" method="POST">
                                    <td><strong>Email</strong></td>
                                    <td><input name="email-content" id="email-content" value=<?= $email ?> readonly></td>
                                    <td>
                                        <input name="user-id" type="hidden" value=<?= $_GET["id"] ?>>
                                        <button class="hidden" id="email-set-btn" type="submit">Set</button>
                                        <button id="email-edit-btn" type="button">Edit...</button>
                                        <button class="hidden" id="email-cancel-btn" type="reset">Cancel</button>                                        
                                    </td>
                                </form>
                            </tr>
                            <tr>
                                <td><strong>Last Password Change</strong></td>
                                <td><input value="<?= $last_password_change ?>" readonly></td>
                                <td><a href="/animazing/pages/change_password.php"><button id="password-update-btn">Change...</button></a></td>
                            </tr>
                            <tr>
                                <form action="/animazing/php/toggle_lightmode.php" method="POST">
                                    <input name="user-id" type="hidden" value="<?= $_GET["id"] ?>">
                                    <td><strong>Light Mode</strong></td>
                                    <td><?= $light_mode ?></td>
                                    <td><button id="toggle-light-mode" type="submit">Toggle...</button></td>
                                </form>
                            </tr>
                        </table>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

    </body>
    <script src="/animazing/js/profile.js"></script>
</html>