<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Validate and sanitize the form data (you can add your own validation rules)

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bank_db";

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to insert the data into the database
    $sql = "INSERT INTO gym_memberships (name, email, phone, address) VALUES (?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters with the form data
    $stmt->bind_param("ssss", $name, $email, $phone, $address);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Membership application submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
