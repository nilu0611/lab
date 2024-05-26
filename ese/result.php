<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
    $subject_id = isset($_POST['subject_id']) ? $_POST['subject_id'] : '';
    $mse_written = isset($_POST['mse_written']) ? $_POST['mse_written'] : '';
    $ese_cvv = isset($_POST['ese_cvv']) ? $_POST['ese_cvv'] : '';
    $ese_written = isset($_POST['ese_written']) ? $_POST['ese_written'] : '';
    $ese_lab = isset($_POST['ese_lab']) ? $_POST['ese_lab'] : '';
    $ese_course_project = isset($_POST['ese_course_project']) ? $_POST['ese_course_project'] : '';
    $ese_ppt = isset($_POST['ese_ppt']) ? $_POST['ese_ppt'] : '';

    // Calculate final marks
    $mse_percentage = $mse_written * 0.30;
    $ese_total = $ese_cvv + $ese_written + $ese_lab + $ese_course_project + $ese_ppt;
    $ese_percentage = ($ese_total / 100) * 70;
    $final_marks = $mse_percentage + $ese_percentage;

    // Fetch the subject name
    $subject_name = '';
    $subject_query = "SELECT name FROM subjects WHERE subject_id = '$subject_id'";
    $subject_result = $conn->query($subject_query);
    if ($subject_result->num_rows > 0) {
        $subject_row = $subject_result->fetch_assoc();
        $subject_name = $subject_row['name'];
    } else {
        $subject_name = "Unknown Subject";
    }

    $sql = "INSERT INTO marks (student_id, subject_id, mse_written, ese_cvv, ese_written, ese_lab, ese_course_project, ese_ppt) VALUES ('$student_id', '$subject_id', '$mse_written', '$ese_cvv', '$ese_written', '$ese_lab', '$ese_course_project', '$ese_ppt')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }

                .result-container {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    width: 100%;
                    max-width: 400px;
                    box-sizing: border-box;
                    margin-top: 20px;
                }

                h2 {
                    text-align: center;
                    color: #333;
                }

                p {
                    margin: 10px 0;
                    color: #333;
                }
              </style>";
        echo "<div class='result-container'>";
        echo "<h2>Result</h2>";
        echo "<p>Student ID: " . $student_id . "</p>";
        echo "<p>Subject ID: " . $subject_id . " (" . $subject_name . ")</p>";
        echo "<p>Final Marks: " . $final_marks . "</p>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
