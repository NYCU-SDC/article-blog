<?php
    // [Practice]-1: Import connection file
    require_once('connection.php');

    // Get id from JS file
    $article_id = $_REQUEST['id'];

    // Specify SQL command
    $sql = "select * from articles where id=".$article_id.";";
    try {
        // [Practice]-2: Execute SQL command
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            
        // [Practice]-3:  Echo result in JSON format
        echo json_encode($result);
    } catch(PDOException $e) {
        die($e->getMessage());
    }
?>
