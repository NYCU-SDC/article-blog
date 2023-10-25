<?php
    // Import connection file
    require_once('connection.php');
            
    // Execute SQL command with PDO
    $sql = "SELECT id, title, updated_at FROM articles;";
    // Read: list all information
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
            
        echo json_encode($result);
    } catch(PDOException $e) {
        die($e->getMessage());
    }
?>
