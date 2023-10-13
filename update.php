<?php
/* Import connection file */
require_once('connection.php');

// Get title and content from POST data
$article_id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$content = $_REQUEST['content'];

// insert new article and id
$sql = "UPDATE articles SET title='".$title."', content='".$content."'
        WHERE id = ".$article_id.";";

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // Fetch the newly inserted article ID
    // $newArticleId = $stmt->fetchColumn();

    // // Output the new article ID
    echo $article_id;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    die($e->getMessage());
}
?>