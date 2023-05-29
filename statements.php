<?php
// Connect to the database (example using MySQLi)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve membership data (example SQL query)
$sql = "SELECT * FROM gym_memberships";
$result = $conn->query($sql);

// Display membership statements
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Format and display the membership statement
        echo "<h3>Membership Statement</h3>";
        echo "<p>Name: " . $row["name"] . "</p>";
        echo "<p>email: " . $row["email"] . "</p>";
        echo "<p>phone: " . $row["phone"] . "</p>";
        echo "<p>address: " . $row["address"] . "</p>";
        
        // Include other relevant details or calculations

        echo "<hr>"; // Add a visual separator between statements
    }
} else {
    echo "No membership data found.";
}

// Close the database connection
$conn->close();
?>
