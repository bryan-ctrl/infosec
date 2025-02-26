<?php
include("config.php"); // Database connection

$query = "SELECT * FROM job_scheduling";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Scheduling</title>
    <link rel="stylesheet" href="jobscheduling.css"> <!-- Link to your CSS file -->
</head>
<body>

<div class="job-scheduling-container">
    <h2>Job Scheduling</h2>

    <!-- Add New Job Button -->
    <a href="create_job.php" class="add-btn">+ Add New Job</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mechanic ID</th>
                <th>Job Date</th>
                <th>Description</th>
                <th>Actions</th> <!-- Edit/Delete -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['mechanic_id']; ?></td>
                    <td><?php echo $row['job_date']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="update_job.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn">Edit</a>
                        <a href="delete_job.php?id=<?php echo $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
