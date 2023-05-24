<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
        <?php include_once "top-nav.php"; ?>
        <div class = "container">
            <h2>Signup form</h2>
        <form action="signup.php" method="post">
            <input type="text" name="username" placeholder="Enter username">
            <input type="email" name="email" placeholder="Enter email">
            <input type="password" name="password" placeholder="Enter password">
            <input type="submit" name="signup" value="Signup">
        </form>
    </div>
        
</body>
</html>
<?php
if (isset($_POST['signup'])) {
    // echo "server access granted";
    echo "<br>";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    include_once "db_connect.php";

    $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$pwd')";
    if ($database_connection->query($sql)=== TRUE) {
        echo "registered successfully";
    }else {
        echo "Try again please";
    };
}
?>