<!DOCTYPE html>
<html>
<head>
    <title>VIT Results</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function validateForm() {
            const mseWritten = document.getElementById("mse_written").value;
            const eseCvv = document.getElementById("ese_cvv").value;
            const eseWritten = document.getElementById("ese_written").value;
            const eseLab = document.getElementById("ese_lab").value;
            const eseCourseProject = document.getElementById("ese_course_project").value;
            const esePpt = document.getElementById("ese_ppt").value;

            if (mseWritten > 100 || mseWritten < 0) {
                alert("MSE Written Marks should be between 0 and 100");
                return false;
            }
            if (eseCvv > 20 || eseCvv < 0) {
                alert("ESE CVV Marks should be between 0 and 20");
                return false;
            }
            if (eseWritten > 20 || eseWritten < 0) {
                alert("ESE Written Marks should be between 0 and 20");
                return false;
            }
            if (eseLab > 20 || eseLab < 0) {
                alert("ESE Lab Marks should be between 0 and 20");
                return false;
            }
            if (eseCourseProject > 20 || eseCourseProject < 0) {
                alert("ESE Course Project Marks should be between 0 and 20");
                return false;
            }
            if (esePpt > 20 || esePpt < 0) {
                alert("ESE PPT Marks should be between 0 and 20");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>VIT Results</h1>
    <form action="result.php" method="post" onsubmit="return validateForm()">
        <div>
            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" required>
        </div>
        <div>
            <label for="subject_id">Subject ID:</label>
            <input type="text" id="subject_id" name="subject_id" required>
        </div>
        <div>
            <label for="mse_written">MSE Written Marks (out of 100):</label>
            <input type="number" id="mse_written" name="mse_written" required>
        </div>
        <div>
            <label for="ese_cvv">ESE CVV Marks (out of 20):</label>
            <input type="number" id="ese_cvv" name="ese_cvv" required>
        </div>
        <div>
            <label for="ese_written">ESE Written Marks (out of 20):</label>
            <input type="number" id="ese_written" name="ese_written" required>
        </div>
        <div>
            <label for="ese_lab">ESE Lab Marks (out of 20):</label>
            <input type="number" id="ese_lab" name="ese_lab" required>
        </div>
        <div>
            <label for="ese_course_project">ESE Course Project Marks (out of 20):</label>
            <input type="number" id="ese_course_project" name="ese_course_project" required>
        </div>
        <div>
            <label for="ese_ppt">ESE PPT Marks (out of 20):</label>
            <input type="number" id="ese_ppt" name="ese_ppt" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
