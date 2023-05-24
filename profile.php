<?php
session_start();

include_once "db_connect.php";
$user_logged_in = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$sql = "SELECT * FROM users WHERE username=?";
$stmt = $database_connection->prepare($sql);
$stmt->bind_param("s", $user_logged_in);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
echo $row['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        table {
            width: 100%;
        }
        table, tr, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div>
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th colspan="2">Action</th>
            </tr>
            <?php if (true) : ?>
                <tr>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><a href='edit.php?id=<?php echo $row['id']; ?>'><i class='bi bi-pencil-square text-success'></i></a></td>
                    <td><a href='delete.php?id=<?php echo $row['id']; ?>'><i class='bi bi-archive-fill text-danger'></i></a></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="5">No user found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
