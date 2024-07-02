<?php
// Fetching POST data
 $name = $_POST["name"];
 $email = $_POST["email"];
 $complaint = $_POST["complaint"];
 $room = $_POST["room"];
 $year = $_POST["year"];
 $hostel = $_POST["hostel"];
 $course = $_POST["course"];
 $date = $_POST["date"];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'complaint management system');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO registration (name, email, complaint, room, year, hostel, course, date) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
    
    // Bind parameters
    $stmt->bind_param("sssissss", $name, $email, $complaint, $room, $year, $hostel, $course, $date);
    
    // Execute statement
    if ($stmt->execute()) {
        echo "Complaint filed successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>