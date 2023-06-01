<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the data for the report (example SQL query)
$sql = "SELECT * FROM membership_payments";
$result = $conn->query($sql);

// Check if data exists
if ($result->num_rows > 0) {
    // Start rendering the report
    echo "<h1>Membership Payments Report</h1>";
    echo "<table>";
    echo "<tr><th>Member Name</th><th>Payment Date</th><th>Amount</th></tr>";

    // Iterate through the data and display rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["member_name"] . "</td>";
        echo "<td>" . $row["payment_date"] . "</td>";
        echo "<td>" . $row["amount"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found for the report.";
}

// Close the database connection
$conn->close();
?>
