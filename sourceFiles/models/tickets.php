<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "ticket_system";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE tickets (
    ticket_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    ticket_date CHAR(20) NOT NULL,
    user_email VARCHAR(50) NOT NULL,
    user_full_name VARCHAR(50) NOT NULL,
    user_phone CHAR(15) NOT NULL,
    ticket_title VARCHAR(50) NOT NULL,
    ticket_description VARCHAR(50) NOT NULL,    
    ticket_status_id INT(6) NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table tickets created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>