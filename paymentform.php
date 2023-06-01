<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $memberName = $_POST['member_name'];
    $paymentDate = date('Y-m-d'); // Current date
    $amount = $_POST['amount'];

    // Database connection credentials
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'bank_db';

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Insert the payment data into the database table
    $sql = "INSERT INTO membership_payments (member_name, payment_date, amount) VALUES ('$memberName', '$paymentDate', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo 'Payment successful!'; // Display a success message
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error; // Display an error message
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gym Membership Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Gym Membership Payment</h1>
    <form method="POST" action="">
        <label for="member_name">Member Name:</label>
        <input type="text" name="member_name" required><br><br>

        <label for="amount">Payment Amount:</label>
        <input type="number" name="amount" required><br><br>

        <input type="submit" value="Submit Payment">
    </form>
</body>
</html>
