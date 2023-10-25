<?php
// Import connection file
require_once('connection.php');

// [Practice]-6: Get title and content from JS
$title = $_REQUEST['title'];
$content = $_REQUEST['content'];

// [Practice]-7: insert new article and content
$sql = "INSERT INTO articles(title, content) VALUES('".$title."', '".$content."');";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // Output
    echo json_encode("sucessful");
} catch(PDOException $e) {
    die($e->getMessage());
}
?>