<?php
// Connect to database
$conn = new mysqli("localhost", "root", "Nilesh@123", "electricity_billing");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Create student
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $prn = $_POST['prn'];
    $cgpa = $_POST['cgpa'];
    $department = $_POST['department'];

    $sql = "INSERT INTO students (name, prn, cgpa, department) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdds", $name, $prn, $cgpa, $department);
    $stmt->execute();
}

// Display all students
function getStudents() {
    global $conn;
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["name"]. "</td>";
            echo "<td>". $row["prn"]. "</td>";
            echo "<td>". $row["cgpa"]. "</td>";
            echo "<td>". $row["department"]. "</td>";
            echo "<td><a href='edit.php?id=". $row["id"]. "'>Edit</a></td>";
            echo "<td><a href='delete.php?id=". $row["id"]. "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "No students found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
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
    <h1>Student Management System</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>
        <label for="prn">PRN:</label>
        <input type="number" id="prn" name="prn"><br>
        <label for="cgpa">CGPA:</label>
        <input type="number" step="0.01" id="cgpa" name="cgpa"><br>
        <label for="department">Department:</label>
        <input type="text" id="department" name="department"><br>
        <input type="submit" name="submit" value="Create">
    </form>
    <h1>Students</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>PRN</th>
            <th>CGPA</th>
            <th>Department</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php getStudents();?>
    </table>
</body>
</html>