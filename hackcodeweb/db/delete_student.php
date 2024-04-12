<?php
require_once 'conn.php';

if (isset($_GET["username"])) {
    $username = $_GET["username"];

    // Delete the employee based on full name
    $sql_delete = "DELETE FROM users WHERE username = ?";
    $stmt_delete = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt_delete, $sql_delete)) {
        mysqli_stmt_bind_param($stmt_delete, "s", $userName);
        mysqli_stmt_execute($stmt_delete);
        header("Location: admin.php"); // Redirect back to emp_register.php after deletion
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>
