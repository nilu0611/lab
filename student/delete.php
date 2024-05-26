<?php
// Connect to database
$conn = new mysqli("localhost", "root", "Nilesh@123", "electricity_billing");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Get student ID from URL
$id = $_GET['id'];

// Delete student data
$sql = "DELETE FROM students WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Redirect to index.php
header("Location: index.php");
?>