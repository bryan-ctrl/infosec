<?php
include("config.php");
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_id = $_POST['vehicle_id'];
    $service_date = $_POST['service_date'];
    $description = $_POST['description'];

    $sql = "INSERT INTO service_history (vehicle_id, service_date, description) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $vehicle_id, $service_date, $description);

    if ($stmt->execute()) {
        header("Location: service_history.php");
        exit();
    } else {
        echo "<p class='error'>Error: " . $stmt->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service Record</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>

<div class="form-container">
    <h2>Add Service Record</h2>
    <form method="POST">
        <div class="form-group">
            <label for="vehicle_id">Vehicle ID:</label>
            <input type="text" id="vehicle_id" name="vehicle_id" required>
        </div>

        <div class="form-group">
            <label for="service_date">Service Date:</label>
            <input type="date" id="service_date" name="service_date" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="3" required></textarea>
        </div>

        <button type="submit" class="submit-btn">Save</button>
        <a href="service_history.php" class="cancel-btn">Cancel</a>
    </form>
</div>

</body>
</html>
