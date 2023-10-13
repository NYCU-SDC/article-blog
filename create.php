<?php
/* Import connection file */
require_once('connection.php');
// $connection = new db_connection;

$title = $_POST['title'];
$content = $_POST['content'];

/* insert new article */
$articles_insert_sql = "
    INSERT INTO articles(title, content)
    VALUES('".$title."', ".$content.");
    RETURNING id;";
$return_value =$connection->sql_query($articles_insert_sql);

$newArticleId = pg_fetch_result($return_value, 0, 0);


if (isset($url)) {
    $url = 'article.html?id='.$newArticleId;
    Header("Location: $url");
}
else {
    Header("Location: article_list.php");
}
?>