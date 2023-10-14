<?php
// Import connection file
require_once('connection.php');
        
// Execute SQL command with PDO
$sql = "SELECT id, title, updated_at FROM articles;";
try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);

    echo json_encode($result);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    die($e->getMessage());
}
?>
