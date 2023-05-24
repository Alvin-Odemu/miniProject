<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php include_once "top-nav.php"; ?>
<div class="login-form">
        <h1>Login here</h1>
        <form action="login.php" method="post">
            <div class="form-input"><input type="text" name="username" placeholder="Enter username"></div>
            <div class="form-input"><input type="password" name="password" placeholder="Enter password"></div>
            <div class="form-input"><input type="submit" name="login" value="Login"></div>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['login'])) {
    // echo "You clicked login";
    $username  = $_POST['username'];
    $pwd = $_POST['password'];
    echo $username. " ". $pwd;

    include_once "db_connect.php";
echo "<br>";
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$pwd'";
    $result = $database_connection->query($sql);
    if($result->num_rows > 0){
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
    }else{
        echo "User not found";
    }
}
?>