<?php

require('DbClass.php');

$servername = "localhost";
$dbname = "chat";
$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$db = new DbClass($conn);

?>