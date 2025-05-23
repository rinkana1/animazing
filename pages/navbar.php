<?php
    require_once(__DIR__ . "/../php/db_connect.php");

    if (isset($_COOKIE["user_id"])) {
        $sql = "SELECT username, display_name, profile_picture FROM users WHERE id = ?";
        $navbar_stmt = $conn->prepare($sql);
        $navbar_stmt->bind_param("s", $_COOKIE["user_id"]);
        $navbar_stmt->execute();
        $navbar_stmt->store_result();

        if ($navbar_stmt->num_rows > 0) {
            $navbar_stmt->bind_result($username, $display_name, $profile_picture);
            $navbar_stmt->fetch();
        }

        if (!$profile_picture) {
            $profile_picture = "default.png";
        }
        $navbar_stmt->close();
    }
?>
<link rel="stylesheet" href="/animazing/css/navbar.css">
<div class="navbar">
    <form class="maze-search" action="/animazing/pages/maze.php" method="GET">
        <input name="query" class="search-input" type="text" placeholder="Let the search begin...">
        <button class="search-submit" type="submit">Search the Maze</button>
    </form>

    <a class="logo" href="/animazing"><img src="/animazing/static/images/AniMazing Logo.png" alt="" height="40px"></a>
    
    <?php if (!isset($_COOKIE["user_id"])): ?>
        <div class="account-management" id="logged-out">
            <a class="sign-up" href="/animazing/pages/signup_page.php"><button>Sign Up</button></a>
            <a class="login" href="/animazing/pages/login_page.php"><button>Log In</button></a>
        </div>
    <? else: ?>
        <div class="account-management" id="logged-in">
            <span class="welcome">Welcome, <?= $display_name ?? $username ?></span>
            <a class="map-button" href="/animazing/pages/map.php?id=<?php echo $_COOKIE['user_id'] ?>"><button>My Map</button></a>
            <!-- <button class="notification-button"><img src="/animazing/static/images/bell.svg" alt="" height="20px" width="20px"></button> -->
            <a class="profile-picture" href="/animazing/pages/profile.php?id=<?php echo $_COOKIE['user_id'] ?>"><img src="/animazing/static/profiles/<?php echo $profile_picture; ?>" alt="" height="27px" width="27px"></a>
        </div>
    <? endif; ?>
</div>