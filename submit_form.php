<?php
// Database connection details
$host = "localhost"; // Update with your database host
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "farm"; // Update with your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $location = $conn->real_escape_string($_POST['location']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact(name, email, phone, location, message) 
            VALUES ('$name', '$email', '$phone', '$location', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
