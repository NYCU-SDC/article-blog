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
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo json_encode("sucessful");
} catch(PDOException $e) {
    die($e->getMessage());
}
?>