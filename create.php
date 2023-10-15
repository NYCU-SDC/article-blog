<?php
// Import connection file
require_once('connection.php');

// Get title and content from JS
$title = $_REQUEST['title'];
$content = $_REQUEST['content'];

// insert new article and content
$sql = "INSERT INTO articles(title, content) VALUES('".$title."', '".$content."');";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo json_encode("sucessful");
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    die($e->getMessage());
}
?>