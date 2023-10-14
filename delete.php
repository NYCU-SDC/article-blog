<?php
// Import connection file
require_once('connection.php');

// Get data from JS
$article_id = $_REQUEST['id'];
        
// Execute SQL command with PDO
$sql = "DELETE from articles where id=".$article_id.";";
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo json_encode("sucessful");
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    die($e->getMessage());
}
?>
