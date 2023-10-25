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
?>