<?php
$conn = new mysqli("localhost", "root", "Nilesh@123", "electricity_billing");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Get student ID from URL
$id = $_GET['id'];

// Get student data
$sql = "SELECT * FROM students WHERE id =?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Update student data
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $prn = $_POST['prn'];
    $cgpa = $_POST['cgpa'];
    $department = $_POST['department'];

    $sql = "UPDATE students SET name=?, prn=?, cgpa=?, department=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siisi", $name, $prn, $cgpa, $department, $id);
    $stmt->execute();
    header("Location: index.php");
}

// Display student data
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <style>
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Edit Student</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row["name"];?>"><br>
        <label for="prn">PRN:</label>
        <input type="number" id="prn" name="prn" value="<?php echo $row["prn"];?>"><br>
        <label for="cgpa">CGPA:</label>
        <input type="number" step="0.01" id="cgpa" name="cgpa" value="<?php echo $row["cgpa"];?>"><br>
        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="<?php echo $row["department"];?>"><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>