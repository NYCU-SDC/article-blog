<?php
// Import connection file
require_once('connection.php');

// Get data from JS
$article_id = $_REQUEST['id'];
        
// Execute SQL command with PDO
$sql = "DELETE from articles where id=".$article_id.";";
try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo json_encode("sucessful");
} catch(PDOException $e) {
    die($e->getMessage());
}
?>
