<?php
// Import connection file
require_once('connection.php');

// Get title and content from POST data
$article_id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$content = $_REQUEST['content'];

// Execute SQL command with PDO
$sql = "UPDATE articles SET title='".$title."', content='".$content."'
        WHERE id = ".$article_id.";";
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