<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Job</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>

<div class="form-container">
    <h2>Add New Job</h2>
    <form method="POST">
        <div class="form-group">
            <label for="mechanic_id">Mechanic ID:</label>
            <input type="text" id="mechanic_id" name="mechanic_id" required>
        </div>

        <div class="form-group">
            <label for="job_date">Job Date:</label>
            <input type="date" id="job_date" name="job_date" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="3" required></textarea>
        </div>

        <button type="submit" class="submit-btn">Save</button>
        <a href="job_scheduling.php" class="cancel-btn">Cancel</a>
    </form>
</div>

</body>
</html>
