<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ncl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
$salary_data = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empid = $_POST['empid'];

    // Fetch data from salary table based on employee ID
    $sql = "SELECT * FROM employees WHERE emp_id = '$empid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $salary_data = $result->fetch_assoc();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Slip</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="form.html">Salary Form</a></li>
            <li><a href="admin.html">admin</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1 id="title">Salary Slip</h1>
        <?php if ($salary_data) { ?>
            <h2>Salary Slip for Employee ID: <?php echo htmlspecialchars($salary_data['emp_id']); ?></h2>
            <p>Name: <?php echo htmlspecialchars($salary_data['name']); ?></p>
            <p>Employee ID: <?php echo htmlspecialchars($salary_data['emp_id']); ?></p>
            <p>Basic Pay: <?php echo htmlspecialchars($salary_data['basicpay']); ?></p>
            <p>HRA: <?php echo htmlspecialchars($salary_data['hra']); ?></p>
            <p>DA: <?php echo htmlspecialchars($salary_data['da']); ?></p>
            <p>Deductions: <?php echo htmlspecialchars($salary_data['deductions']); ?></p>
            <p>Total Salary: <?php echo htmlspecialchars($salary_data['basicpay'] + $salary_data['hra'] + $salary_data['da'] - $salary_data['deductions']); ?></p>
        <?php } else { ?>
            <p>No salary data found for the given Employee ID.</p>
        <?php } ?>
    </div>
</body>
</html>
