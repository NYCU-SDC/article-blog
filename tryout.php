<?php
	
	// Import connection file
    require_once('connection.php');
    
    // sql commands
    $sql = "select id, title, updated_at from articles";
    // Read: list all information
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);

        echo json_encode($result);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        die($e->getMessage());
    }
?>