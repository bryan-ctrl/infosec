<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Set default page to `service_history` if no page is specified
$page = isset($_GET['page']) ? $_GET['page'] : 'service_history';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>
<body>
<div class="dashboard-container">
    <aside class="sidebar">
        <h2>Navigation</h2>
        <ul>
            <li><a href="?page=service_history">Service History</a></li>
            <li><a href="?page=job_scheduling">Job Scheduling</a></li>
        </ul>
        <form action="logout.php" method="POST">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </aside>
    <main class="content">
        <?php
        // Include the selected page dynamically
        if ($page == "service_history") {
            include("service_history.php");
        } elseif ($page == "job_scheduling") {
            include("job_scheduling.php");
        } else {
            echo "<p>Invalid page selected.</p>";
        }
        ?>
    </main>
</div>
</body>
</html>
