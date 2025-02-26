<?php
include("db_connection.php"); // Ensure database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Prevent SQL injection

    // Prepare delete query
    $query = "DELETE FROM job_scheduling WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Record deleted successfully!'); window.location.href='dashboard.php?page=job_scheduling';</script>";
    } else {
        echo "<script>alert('Error deleting record!'); window.location.href='dashboard.php?page=job_scheduling';</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='dashboard.php?page=job_scheduling';</script>";
}
?>
