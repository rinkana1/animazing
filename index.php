<!DOCTYPE html>
<?php
    if($_COOKIE["user_id"]) {
        include(__DIR__ . "/php/get_light_mode.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniMazing</title>

    <!-- CSS Imports -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">

    <?php if($light_mode_check): ?>
        <script src="/animazing/js/set_light_mode.js"></script>
    <?php endif; ?>
</head>
<body>
    <?php include './pages/navbar.php'; ?>
    
    <div class="main-section">
        <img class="logo-img" src="static/images/Animazing Logo.png" alt="" height="200px">
         <form class="maze-search" action="/animazing/pages/maze.php">
            <input name="query" class="form-text-input" type="text" placeholder="Let the search begin...">
            <button class="form-submit" type="submit">Search the Maze</button>
         </form>
         <div class="opening-text">
            <h1>Welcome to AniMazing!</h1>
            <p>Your one stop show to find information about all of your favorite anime and manga series!</p>
            <p>Dive into a world of epic battles, heartfelt stories, and unforgettable characters. 
                Whether you're a seasoned otaku or just starting your journey, AniMazing is here to 
                help you explore detailed episode guides, character bios, manga updates, and more. 
                Stay up-to-date with the latest releases, discover hidden gems, and connect with 
                fellow fans through our community features.</p>
            <p>So without further ado...</p>
            <h1 id="end-message">Let the Search Begin</h1>
         </div>
    </div>
</body>
</html>