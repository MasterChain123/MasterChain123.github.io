<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement to be executed
    $stmt = $conn->prepare("SELECT * FROM your_table_name");
    
    // execute the query
    $stmt->execute();

    // Set the resulting array to associative to output as JSON
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    // Return the resulting data as JSON
    echo json_encode($result);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>
