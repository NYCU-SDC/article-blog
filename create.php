<?php
/* Import connection file */
require_once('connection.php');
// $connection = new db_connection;

// Get title and content from POST data
$title = $_POST['title'];
$content = $_POST['content'];

// insert new article and id
$sql = "INSERT INTO articles(title, content) VALUES('".$title."', '".$content."') RETURNING id;";

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // Fetch the newly inserted article ID
    $newArticleId = $stmt->fetchColumn();

    // Output the new article ID
    echo $newArticleId;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    die($e->getMessage());
}

// $return_value =$conn->sql_query($articles_insert_sql);

// // Get the ID of the newly inserted article
// $newArticleId = pg_fetch_result($return_value, 0, 0);

// echo $newArticleId;

// if (!empty($result)) {
//     $url = 'article.html?id='.$result;
//     Header("Location: $url");
// }
// else {
//     Header("Location: article_list.php");
// }
?>