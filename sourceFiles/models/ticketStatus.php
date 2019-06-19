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
    $sql = "CREATE TABLE ticket_status (
    status_id int(5) NOT NULL,
    status_name VARCHAR(30) NOT NULL,
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table ticket_status created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>