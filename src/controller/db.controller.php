<?php

require_once __DIR__ . "/../../conf/db.conf.php";

$servername = DB_SERVER_NAME;
$dbName = DB_NAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 
