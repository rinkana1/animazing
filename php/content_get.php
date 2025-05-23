<?php 
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "animazing";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $content_id = trim($_GET['id']);

        $_SESSION['form_data'] = [
            'content_id' => $content_id
        ];

        $sql = "SELECT name, type, subtype, avg_rating, release_date, description, num_of_episodes FROM maze WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $content_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($name, $type, $subtype, $avg_rating, $release_date, $description, $num_of_episodes);
            $stmt->fetch();

            $_SESSION['response'] = [
                'name' => $name,
                'type' => $type,
                'subtype' => $subtype,
                'avg_rating' => $avg_rating,
                'release_date' => $release_date,
                'description' => $description,
                'num_of_episodes' => $num_of_episodes
            ];
            header("Location: ../pages/content.php");
        } else {
            $_SESSION['error'] = "No content found with that ID.";
            header("Location: ../pages/content.php");
            exit;
        }
        $stmt->close();
    }
    $conn->close();
?>