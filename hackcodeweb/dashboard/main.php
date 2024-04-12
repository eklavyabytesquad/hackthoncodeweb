<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
    
    <?php
    // Check if a session is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Check if 'fullName' key is set in $_SESSION
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Convert the full name to uppercase
    $fullNameUpper = strtoupper($username);
} else {
    // If 'fullName' is not set, you can set a default value or redirect the user
    // For example, set a default value
    $fullNameUpper = "Guest";
}
?>
    hellooo u have successfully registered 

    <br>
    Thanks For Registering <strong><?php echo $fullNameUpper; ?></strong>
    <br>
    <button><a href="../db/logout.php" class="dropdown-item"><strong>Logout</strong></a></button>
</body>
</html>