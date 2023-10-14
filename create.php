<?php
// Import connection file
require_once('connection.php');

// Get title and content from JS
$title = $_REQUEST['title'];
$content = $_REQUEST['content'];

// insert new article and content and get a returning id
$sql = "INSERT INTO articles(title, content) VALUES('".$title."', '".$content."') RETURNING id;";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // Fetch the newly inserted article ID
    $newArticleId = $stmt->fetchColumn();

    // Output the new article ID
    echo json_encode($newArticleId);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    die($e->getMessage());
}
?>