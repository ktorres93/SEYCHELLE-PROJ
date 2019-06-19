<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "ticket_system";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE $dbname";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "$dbname Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
 // sql to create table
 try{
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
        echo "Table 'tickets' created successfully";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
//creating view of tables
$sql = "CREATE VIEW [Table Merge] AS SELECT * FROM ticketStatus,tickets";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    //needs changing
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn = null;
?>