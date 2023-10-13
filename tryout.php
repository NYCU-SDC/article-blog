<?php
	
	// Initialize connection variables.
	$host = 'localhost';
	$dbname = 'pylin';
	$username = 'pylin';
	$password = 'pylin';

    // Build connection
    try {
        $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;";
        
        // Make a database connection
        $conn = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    
    // sql commands
    $sql = "select id, title, updated_at from articles";
    // Read: list all information
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        die($e->getMessage());
    }
?>