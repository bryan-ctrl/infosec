<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

// Ensure database connection is available
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle schedule request submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['requested_date'])) {
    $requested_date = $_POST['requested_date'];

    $sql = "INSERT INTO schedule_requests (user_id, requested_date, status) VALUES (?, ?, 'Pending')";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("is", $user_id, $requested_date);
        if ($stmt->execute()) {
            $message = "Schedule request submitted successfully!";
        } else {
            $message = "Error submitting request: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "Database error: " . $conn->error;
    }
}

// Fetch user info
$firstname = "User"; // Default name
$sql = "SELECT firstname FROM users WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($firstname);
    $stmt->fetch();
    $stmt->close();
}

// Fetch schedule requests
$sql = "SELECT requested_date, status FROM schedule_requests WHERE user_id = ?";
$schedule_requests = [];
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $schedule_requests[] = $row;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="userdashboard.css">
</head>
<body>

<header>
    <h1>User Dashboard</h1>
</header>

<div class="main-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="userdashboard.php">🏠 Home</a></li>
            <li><a href="logout.php" class="logout-btn">🚪 Logout</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="content">
        <h2>Welcome, <?php echo htmlspecialchars($firstname); ?>!</h2>
        
        <?php if (!empty($message)): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <form method="post">
            <label for="requested_date">Request Schedule:</label>
            <input type="date" name="requested_date" required>
            <button type="submit">Submit Request</button>
        </form>

        <h3>Your Schedule Requests</h3>
        <table>
            <tr>
                <th>Date</th>
                <th>Status</th>
            </tr>
            <?php if (!empty($schedule_requests)): ?>
                <?php foreach ($schedule_requests as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['requested_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No schedule requests found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<footer>
    <p>&copy; <?php echo date("Y"); ?> My Website. All rights reserved.</p>
</footer>

</body>
</html>
