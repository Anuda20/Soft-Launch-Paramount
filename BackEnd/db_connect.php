<?php
$servername = "localhost";
$username = "root";   // default WAMP user
$password = "";       // default WAMP password is empty
$dbname = "paramount_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
