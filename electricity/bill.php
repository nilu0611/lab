<?php
$servername = "localhost"; // Change if necessary
$username = "root"; // Change if necessary
$password = "Nilesh@123"; // Change if necessary
$dbname = "electricity_billing";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to calculate the bill amount based on units consumed
function calculate_bill($units) {
    $billAmount = 0;

    if ($units <= 50) {
        $billAmount = $units * 3.50;
    } elseif ($units <= 150) {
        $billAmount = 50 * 3.50 + ($units - 50) * 4.00;
    } elseif ($units <= 250) {
        $billAmount = 50 * 3.50 + 100 * 4.00 + ($units - 150) * 5.20;
    } else {
        $billAmount = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + ($units - 250) * 6.50;
    }

    return $billAmount;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $units = intval($_POST['units']);
    $bill_amount = calculate_bill($units);

    $stmt = $conn->prepare("INSERT INTO customers (name, address, units, bill_amount) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $name, $address, $units, $bill_amount);

    if ($stmt->execute()) {
        echo number_format($bill_amount, 2);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
