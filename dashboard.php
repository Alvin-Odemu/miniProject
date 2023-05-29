<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <h1>welcome to the dashboard</h1>
    <div class="dashboard-container">
        <nav class="dashboard-nav">
            <div class="dashboard-header">
                <ul>
                    <li><a href="dashboard.php?id=profile">Profile</a></li>
                    <li><a href="dashboard.php?id=statements">View statements</a></li>
                    <li><a href="dashboard.php?id=Membership">Apply Membership</a></li>
                    <li><a href="dashboard.php?id=reports">Reports</a></li>
                    <li><a href="dashboard.php?id=logout">Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="dashboard-content">
            <?php
            if (isset($_GET['id'])) {
                $selected =  $_GET['id'];
                switch ($selected) {
                    case 'profile':
                        include_once "profile.php";
                        break;
                    case 'statements':
                        include_once "statements.php";
                        break;
                    case 'Membership':
                        include_once "membershipform.php";
                        break;
                    case 'reports':
                        echo "You selected reports";
                        break;
                    case 'logout':
                        // Perform logout action
                        session_start();
                        $_SESSION = array(); // Clear session 
                        session_destroy(); // Destroy the session
                        header("Location: login.php"); // Redirect to the login page  
                        exit();
                    default:
                        # code...
                        break;
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
