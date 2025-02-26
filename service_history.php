<?php
include("config.php"); // Database connection

$query = "SELECT * FROM service_history";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service History</title>
    <link rel="stylesheet" href="servicehistory.css"> <!-- Link to your CSS file -->
</head>
<body>

<div class="service-history-container">
    <h2>Service History</h2>

    <!-- Add New Service Record Button -->
    <a href="create_service.php" class="add-btn">+ Add Service Record</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vehicle ID</th>
                <th>Service Date</th>
                <th>Description</th>
                <th>Actions</th> <!-- Edit/Delete -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['vehicle_id']; ?></td>
                    <td><?php echo $row['service_date']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="update_service.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn">Edit</a>
                        <a href="delete_service.php?id=<?php echo $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
