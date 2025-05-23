<!DOCTYPE html>
<?php 
    require_once(__DIR__ . "/../php/db_connect.php");

    if($_COOKIE["user_id"]) {
        include(__DIR__ . "/../php/get_light_mode.php");
    }

    if (isset($_COOKIE["user_id"])) {
        $sql = "SELECT id
                FROM map
                WHERE content_id = ? AND user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $_GET["id"], $_COOKIE["user_id"]);
        $stmt->execute();
        $stmt->store_result();

        $isAdded = $stmt->num_rows() > 0 ? true : false;
        $stmt->close();
        
        $sql = "SELECT
                maze.name, maze.type, maze.subtype, maze.avg_rating, map.rating AS user_rating,
                maze.release_date, maze.description, maze.num_of_episodes
                FROM maze
                LEFT JOIN map on maze.id = map.content_id AND map.user_id = ?
                WHERE maze.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $_COOKIE["user_id"], $_GET["id"]);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows() > 0) {
            $stmt->bind_result(
                $name,
                $type,
                $subtype,
                $avg_rating,
                $user_rating,
                $release_date,
                $description,
                $num_of_episodes
            );
            $stmt->fetch();

            $subtypeMap = [
                1 => 'TV Series',
                2 => 'Movie',
                3 => 'OVA',
                4 => 'ONA',
                5 => 'Special',
                6 => 'TV Special'
            ];
            $subtype = $subtypeMap[$subtype] ?? 'Other';
        }
    } else {
        $sql = "SELECT name, type, subtype, avg_rating, release_date, description, num_of_episodes FROM maze WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_GET["id"]);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows() > 0) {
            $stmt->bind_result(
                $name,
                $type,
                $subtype,
                $avg_rating,
                $release_date,
                $description,
                $num_of_episodes
            );
            $stmt->fetch();

            $subtypeMap = [
                1 => 'TV Series',
                2 => 'Movie',
                3 => 'OVA',
                4 => 'ONA',
                5 => 'Special',
                6 => 'TV Special'
            ];
            $subtype = $subtypeMap[$subtype] ?? 'Other';
        }
    }
    
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AniMazing | <?php echo $name ?></title>

        <!-- CSS Imports -->
        <link rel="stylesheet" href="/animazing/css/reset.css">
        <link rel="stylesheet" href="/animazing/css/style.css">
        <link rel="stylesheet" href="/animazing/css/content.css">

        <?php if($light_mode_check): ?>
            <script src="/animazing/js/set_light_mode.js"></script>
        <?php endif; ?>
    </head>
    <body>
        <?php include './navbar.php'; ?>
        
        <div class="sidebar">
            <img class="content-picture" src="/animazing/static/content/default.png" alt="No image found...">
            <h2><?php echo $name ?></h2>
            <?php if(isset($_COOKIE["user_id"])): ?>
                <!-- TODO: Add functionality to Add to Map button -->
                <?php
                    $formAction = $isAdded ? "/animazing/php/remove_from_map.php" : "/animazing/php/add_to_map.php";
                    $btnClass = $isAdded ? "add-map-button added-to-map" : "add-map-button";
                    $btnText = $isAdded ? "Added to Map" : "Add to Map";
                    ?>
                    <br><form action="<?= $formAction ?>" method="POST">
                        <input name="user-id" type="hidden" value="<?= $_COOKIE["user_id"] ?>">
                        <input name="content-id" type="hidden" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="redirect-to" value="content">
                        <button class="<?= $btnClass ?> center" data-id="<?= $_GET['id'] ?>" type="submit"><?= $btnText ?></button>
                    </form><br>

                <?php if($isAdded): ?>
                    <?php
                        function is_selected($option) {
                            global $user_rating;
                            return ($user_rating == $option) ? "selected" : "";
                        }
                    ?>
                    <form class="rating-form center" action="/animazing/php/set_rating.php" method="POST">
                        <span><strong>Rating: </strong></span>
                        <input type="hidden" name="user-id" value="<?= $_COOKIE["user_id"] ?>">
                        <input type="hidden" name="content-id" value="<?= $_GET["id"] ?>">
                        <select name="rating-value" id="rating-select">
                            <option value="">Select</option>
                            <option <?php echo is_selected(1); ?> value="1">1</option>
                            <option <?php echo is_selected(2); ?> value="2">2</option>
                            <option <?php echo is_selected(3); ?> value="3">3</option>
                            <option <?php echo is_selected(4); ?> value="4">4</option>
                            <option <?php echo is_selected(5); ?> value="5">5</option>
                            <option <?php echo is_selected(6); ?> value="6">6</option>
                            <option <?php echo is_selected(7); ?> value="7">7</option>
                            <option <?php echo is_selected(8); ?> value="8">8</option>
                            <option <?php echo is_selected(9); ?> value="9">9</option>
                            <option <?php echo is_selected(10); ?> value="10">10</option>
                        </select>
                        <button type="submit">Set Rating</button>
                    </form>
                <?php endif; ?>

            <?php endif; ?>

            <br>
            <div class="info">
                <p><strong>Type: </strong><?php echo $type ? "Anime" : "Manga" ?><?php echo $type ? " - " . $subtype : "" ?></p>
                <p><strong>Number of Episodes: </strong><?php echo $num_of_episodes ?></p>
                <p><strong>Overall Rating: </strong><?php echo $avg_rating ?></p>
                <p><strong>Release Date: </strong><?php echo $release_date ?></p>
            </div>
        </div>

        <div class="main-section">
            <div class="desc">
                <h2>Description:</h2><br>
                <p><?php echo $description ?></p>
            </div>

            <div class="news">

            </div>
        </div>
        <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".add-map-button.added-to-map").forEach(button => {
                const originalText = "Added to Map";
                const hoverText = "Remove";

                button.addEventListener("mouseenter", () => {
                    button.textContent = hoverText;
                });

                button.addEventListener("mouseleave", () => {
                    button.textContent = originalText;
                });
            });
        });
        </script>
    </body>
</html>