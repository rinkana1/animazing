<!DOCTYPE html>
<?php
    require_once(__DIR__ . "/../php/db_connect.php");

    if($_COOKIE["user_id"]) {
        include(__DIR__ . "/../php/get_light_mode.php");
    }

    if ($_SERVER["REQUEST_METHOD"] != "GET") {
        die("Something went wrong :(");
    }

    if (!$_GET['id']) {
        die("Something went wrong :(");
    }

    $sql = "SELECT content_id FROM map WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_GET["id"]);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($returned_ids);
        $result_ids = [];

        while($stmt->fetch()) {
            $result_ids[] = $returned_ids;
        }
    } else {
        $error = "No results found!";
    }
    $stmt->close();

    $sql2 = "SELECT username, display_name FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param("s", $_GET["id"]);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user, $display_name);
        $stmt->fetch();
    } else {
        $error = "How did you even get this far??";
    }
    $stmt->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniMazing | The Maze</title>

    <!-- CSS Imports -->
        <link rel="stylesheet" href="/animazing/css/reset.css">
        <link rel="stylesheet" href="/animazing/css/style.css">
        <link rel="stylesheet" href="/animazing/css/maze_map.css">

        <?php if($light_mode_check): ?>
        <script src="/animazing/js/set_light_mode.js"></script>
    <?php endif; ?>
</head>
<body>
    <?php include './navbar.php'; ?>

    <div class="main-section">
        <?php if (!empty($result_ids)): ?>
            <?php 
                $placeholders = implode(',', array_fill(0, count($result_ids), '?'));

                $sort = $_GET['sort'] ?? "name";
                $sortColumnMap = [
                    "name" => "name ASC",
                    "nameDesc" => "name DESC",
                    "rating" => "avg_rating ASC",
                    "ratingDesc" => "avg_rating DESC",
                    "type" => "subtype ASC",
                    "typeDesc" => "subtype DESC",
                    "numEps" => "num_of_episodes ASC",
                    "numEpsDesc" => "num_of_episodes DESC"
                ];
                $orderBy = $sortColumnMap[$sort] ?? "name ASC";

                $sql = "SELECT maze.id, maze.name, maze.type, maze.subtype, map.rating AS user_rating, maze.num_of_episodes
                        FROM maze
                        LEFT JOIN map ON maze.id = map.content_id AND map.user_id = ?
                        WHERE maze.id IN ($placeholders)
                        ORDER BY $orderBy";

                $stmt = $conn->prepare($sql);

                if($stmt === false) {
                    die("Prepare failed: " . $conn->error);
                }
                
                $types = str_repeat("d", count($result_ids));
                $stmt->bind_param("s" . $types, $_GET["id"], ...$result_ids);

                $stmt->execute();
                $result = $stmt->get_result();

                $anime_count = 0;
                $manga_count = 0;
            ?>
            <h1><?= $display_name ?? $user ?>'s Map</h1>
            
            <table class="search-results anime-results">
                <tr>
                    <?php if($_COOKIE["user_id"]): ?>
                        <th colspan="5">Anime</th>
                    <?php else: ?>
                        <th colspan="4">Anime</th>
                    <?php endif; ?>
                </tr>
                <tr>
                    <!-- Sort functions are in the table headers :) -->
                    <?php
                        function sortLink($label, $param) {
                            global $sort, $query;
                            $current = $_GET['sort'] ?? '';
                            $newSort = ($current === $param) ? $param . 'Desc' : $param;
                            $arrow = ($current === $param) ? '↑' : (($current === $param . 'Desc') ? '↓' : '-');
                            return "<a href=\"?id=" . urlencode($_GET["id"]) . "&sort=$newSort\">$label $arrow</a>";
                        }
                    ?>
                    <th><?= sortLink("Name", "name") ?></th>
                    <th><?= sortLink("Rating", "rating") ?></th>
                    <th><?= sortLink("Type", "type") ?></th>
                    <th><?= sortLink("# of Eps", "numEps") ?></th>
                    <?php if($_COOKIE["user_id"]): ?><th></th><?php endif; ?>
                </tr>

                <?php while($row = $result->fetch_assoc()): ?>
                    <?php
                        $content_id = $row['id'];
                        
                        if (strlen($row['name']) > 70) {
                            $name = substr(htmlspecialchars($row['name']), 0, 80) . "...";
                        } else {
                            $name = htmlspecialchars($row['name']);
                        }

                        $user_rating = $row['user_rating'];
                        $type = htmlspecialchars($row['type']);
                        $subtype = htmlspecialchars($row['subtype']);
                        $num_of_episodes = htmlspecialchars($row['num_of_episodes']);
                        
                        $name = htmlspecialchars(strlen($row['name']) > 70 ? substr($row['name'], 0, 80) . "..." : $row['name']);
                        $subtypeMap = [
                            1 => 'TV Series',
                            2 => 'Movie',
                            3 => 'OVA',
                            4 => 'ONA',
                            5 => 'Special',
                            6 => 'TV Special'
                        ];
                        $subtype = $subtypeMap[$row['subtype']] ?? 'Other';

                        if ($type == 1) $anime_count++;
                    ?>
                    <?php if ($type == 1): ?>
                        <tr>
                            <td id="name">
                                <a href="/animazing/pages/content.php?id=<?php echo $content_id ?>">
                                    <?php echo $name; ?>
                                </a>
                            </td>
                            <td class="data" id="center"><?php echo $user_rating ?? "---" ?></td>
                            <td class="data"><?php echo $subtype; ?></td>
                            <td class="data" id="center"><?php echo $num_of_episodes; ?></td>
                            <?php if($_COOKIE["user_id"]): ?>
                                <td class="button-space">
                                    <form action="/animazing/php/remove_from_map.php" method="POST">
                                        <input name="user-id" type="hidden" value="<?= $_COOKIE["user_id"]?>">
                                        <input name="content-id" type="hidden" value="<?= $row['id'] ?>">
                                        <input name="search_query" type="hidden" value="">
                                        <input type="hidden" name="redirect-to" value="map">
                                        <button class="add-map-button added-to-map" data-id="<?= $row['id'] ?>" type="submit">Added to Map</button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endif; ?>
                <?php endwhile; ?>

                <?php if (!$anime_count): ?>
                    <tr>
                        <?php if($_COOKIE["user_id"]): ?>
                            <td colspan="5">No anime found with that keyword...</td>
                        <?php else: ?>
                            <td colspan="4">No anime found with that keyword...</td>
                        <?php endif; ?>
                        
                    </tr>
                <?php endif; ?>
            </table>

            <?php
                $stmt->execute();
                $result = $stmt->get_result();
            ?>

            <table class="search-results manga-results">
                <tr>
                    <?php if($_COOKIE["user_id"]): ?>
                        <th colspan="4">Manga</th>
                    <?php else: ?>
                        <th colspan="3">Manga</th>
                    <?php endif; ?>
                </tr>
                <tr>
                    <th id="name">Name</th>
                    <th id="data">Rating</th>
                    <th id="data"># of Chapters</th>

                    <?php if($_COOKIE["user_id"]): ?>
                        <th></th>
                    <?php endif; ?>
                </tr>

                <?php while($row = $result->fetch_assoc()): ?>
                    <?php
                        $content_id = $row['id'];
                        
                        if (strlen($row['name']) > 50) {
                            $name = substr(htmlspecialchars($row['name']), 0, 50) . "...";
                        } else {
                            $name = htmlspecialchars($row['name']);
                        }
    
                        $user_rating = $row['user_rating'];
                        $type = htmlspecialchars($row['type']);
                        $num_of_chapters = htmlspecialchars($row['num_of_episodes']);

                        if ($type == 0) $manga_count++;
                    ?>
                    <?php if ($type == 0): ?>
                        <tr>
                            <td id="name">
                                <a href="/animazing/pages/content.php?id=<?php echo $content_id ?>">
                                    <?php echo $name; ?>
                                </a>
                            </td>
                            <td class="data" id="center"><?php echo $user_rating ?? "---" ?></td>
                            <td class="data" id="center"><?php echo $num_of_chapters ?></td>
                            <td class="button-space">
                                <form action="/animazing/php/remove_from_map.php" method="POST">
                                    <input name="user-id" type="hidden" value="<?= $_COOKIE["user_id"]?>">
                                    <input name="content-id" type="hidden" value="<?= $row['id'] ?>">
                                    <input name="search_query" type="hidden" value="">
                                    <input type="hidden" name="redirect-to" value="map">
                                    <button class="add-map-button added-to-map" data-id="<?= $row['id'] ?>" type="submit">Added to Map</button>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endwhile; ?>

                <?php if (!$manga_count): ?>
                    <?php if($_COOKIE["user_id"]): ?>
                            <td colspan="4">No manga found with that keyword...</td>
                        <?php else: ?>
                            <td colspan="3">No manga found with that keyword...</td>
                        <?php endif; ?>
                <?php endif; ?>
            </table>

            <?php 
                $stmt->close();
            ?>

        <?php elseif (!empty($error)): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
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