<!DOCTYPE html>
<?php
    require_once(__DIR__ . "/../php/db_connect.php");

    if($_COOKIE["user_id"]) {
        include(__DIR__ . "/../php/get_light_mode.php");
    }

    $query = trim($_GET['query']) ?? "";

    if(!$query) {
        $sql = "SELECT id FROM maze";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($returned_ids);
            $result_ids = [];

            while ($stmt->fetch()) {
                $result_ids[] = $returned_ids;
            };
        } else {
            $error = "No anime or manga found with that query.";

        }

    } else {
        $sql = "SELECT id FROM maze WHERE name LIKE ?";
        $stmt = $conn->prepare($sql);

        $search = "%$query%";
        $stmt->bind_param("s", $search);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($returned_ids);
            $result_ids = [];

            while ($stmt->fetch()) {
                $result_ids[] = $returned_ids;
            };
        } else {
            $error = "No anime or manga found with that query.";
        }
    }

    $user_map_ids = [];

    if ($_COOKIE["user_id"] && !empty($result_ids)) {
        $placeholders = implode(',', array_fill(0, count($result_ids), '?'));
        $sql = "SELECT content_id FROM map WHERE user_id = ? AND content_id IN ($placeholders)";
        $stmt = $conn->prepare($sql);
        
        $types = 'i' . str_repeat('i', count($result_ids));
        $params = array_merge([$_COOKIE["user_id"]], $result_ids);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $stmt->bind_result($map_id);

        while ($stmt->fetch()) {
            $user_map_ids[] = $map_id;
        }

        $stmt->close();
    }

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
            <?php if (!$_GET["query"]): ?>
                <p>Showing all results:</p><br>
            <?php else: ?>
                <p>Showing results for "<?php echo $query ?>":</p><br>
            <?php endif; ?>

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

                $sql = "SELECT id, name, type, subtype, avg_rating, num_of_episodes
                        FROM maze
                        WHERE id IN ($placeholders)
                        ORDER BY $orderBy";

                $stmt = $conn->prepare($sql);

                if($stmt === false) {
                    die("Prepare failed: " . $conn->error);
                }
                
                $types = str_repeat("i", count($result_ids));
                $stmt->bind_param($types, ...$result_ids);

                $stmt->execute();
                $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                $anime_rows = array_filter($result, fn($row) => $row['type'] == 1);
                $manga_rows = array_filter($result, fn($row) => $row['type'] == 0);

                $anime_count = 0;
                $manga_count = 0;
            ?>
            
            <!-- ANIME TABLE -->
            <table class="search-results anime-results">
                <tr>
                    <th colspan="<?php echo $_COOKIE["user_id"] ? 5 : 4; ?>">Anime</th>
                </tr>
                <tr>
                    <!-- Sorting Headers -->
                    <?php
                        function sortLink($label, $param) {
                            global $sort, $query;
                            $current = $_GET['sort'] ?? '';
                            $newSort = ($current === $param) ? $param . 'Desc' : $param;
                            $arrow = ($current === $param) ? '↑' : (($current === $param . 'Desc') ? '↓' : '-');
                            return "<a href=\"?query=" . urlencode($query) . "&sort=$newSort\">$label $arrow</a>";
                        }
                    ?>
                    <th><?= sortLink("Name", "name") ?></th>
                    <th><?= sortLink("Rating", "rating") ?></th>
                    <th><?= sortLink("Type", "type") ?></th>
                    <th><?= sortLink("# of Eps", "numEps") ?></th>
                    <?php if($_COOKIE["user_id"]): ?><th></th><?php endif; ?>
                </tr>

                <?php if (count($anime_rows)): ?>
                    <?php foreach ($anime_rows as $row): ?>
                        <?php
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
                        ?>
                        <tr>
                            <td>
                                <a href="/animazing/pages/content.php?id=<?= $row['id'] ?>">
                                    <?= $name ?>
                                </a>
                            </td>
                            <td class="data" id="center">
                                <?= htmlspecialchars($row['avg_rating']) ?>
                            </td>
                            <td class="data"><?= $subtype ?></td>
                            <td class="data" id="center">
                                <?= htmlspecialchars($row['num_of_episodes']) ?>
                            </td>
                            <?php if($_COOKIE["user_id"]): ?>
                                <?php
                                    $isAdded = in_array($row['id'], $user_map_ids);
                                    $formAction = $isAdded ? "/animazing/php/remove_from_map.php" : "/animazing/php/add_to_map.php";
                                    $btnClass = $isAdded ? "add-map-button added-to-map" : "add-map-button";
                                    $btnText = $isAdded ? "Added to Map" : "Add to Map";
                                ?>
                                <td class="button-space">
                                    <form action="<?= $formAction ?>" method="POST">
                                        <input name="user-id" type="hidden" value="<?= $_COOKIE["user_id"] ?>">
                                        <input name="content-id" type="hidden" value="<?= $row['id'] ?>">
                                        <input name="search_query" type="hidden" value="<?= $_GET['query'] ?? "" ?>">
                                        <input type="hidden" name="redirect-to" value="maze">
                                        <button class="<?= $btnClass ?>" data-id="<?= $row['id'] ?>" type="submit"><?= $btnText ?></button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="<?= $_COOKIE["user_id"] ? 5 : 4 ?>">
                            No anime found with that keyword...
                        </td>
                    </tr>
                <?php endif; ?>
            </table>

            <!-- MANGA TABLE -->
            <table class="search-results manga-results">
                <tr><th colspan="<?= $_COOKIE["user_id"] ? 4 : 3 ?>">Manga</th></tr>
                <tr>
                    <th id="name">Name</th>
                    <th id="data">Rating</th>
                    <th id="data"># of Chapters</th>
                    <?php if($_COOKIE["user_id"]): ?><th></th><?php endif; ?>
                </tr>

                <?php if (count($manga_rows)): ?>
                    <?php foreach ($manga_rows as $row): ?>
                        <?php
                            $name = htmlspecialchars(strlen($row['name']) > 50 ? substr($row['name'], 0, 50) . "..." : $row['name']);
                        ?>
                        <tr>
                            <td><a href="/animazing/pages/content.php?id=<?= $row['id'] ?>"><?= $name ?></a></td>
                            <td class="data" id="center"><?= htmlspecialchars($row['avg_rating']) ?></td>
                            <td class="data" id="center"><?= htmlspecialchars($row['num_of_episodes']) ?></td>
                            <?php if($_COOKIE["user_id"]): ?>
                                <?php
                                $isAdded = in_array($row['id'], $user_map_ids);
                                $formAction = $isAdded ? "/animazing/php/remove_from_map.php" : "/animazing/php/add_to_map.php";
                                $btnClass = $isAdded ? "add-map-button added-to-map" : "add-map-button";
                                $btnText = $isAdded ? "Added to Map" : "Add to Map";
                                ?>
                                <td class="button-space">
                                    <form action="<?= $formAction ?>" method="POST">
                                        <input name="user-id" type="hidden" value="<?= $_COOKIE["user_id"] ?>">
                                        <input name="content-id" type="hidden" value="<?= $row['id'] ?>">
                                        <input name="search_query" type="hidden" value="<?= $_GET['query'] ?? "" ?>">
                                        <input type="hidden" name="redirect-to" value="maze">
                                        <button class="<?= $btnClass ?>" data-id="<?= $row['id'] ?>" type="submit"><?= $btnText ?></button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="<?= $_COOKIE["user_id"] ? 4 : 3 ?>">No manga found with that keyword...</td></tr>
                <?php endif; ?>
            </table>

            <?php $stmt->close(); ?>

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