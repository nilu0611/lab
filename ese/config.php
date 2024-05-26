<?php
$servername = "localhost";
$username = "root";
$password = "Nilesh@123";
$dbname = "VITResults";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
