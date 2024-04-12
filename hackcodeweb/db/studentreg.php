<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SS TRANSPORT EMP REGISTER</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            font-style: normal;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
        require_once "conn.php"; // Include the database connection file

        
        // Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert into database
    $sql = "INSERT INTO users (username, password) 
            VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    if (mysqli_stmt_execute($stmt)) {
        $success_message = "Successfully submitted.";
    } else {
        $error_message = "Error submitting data: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
        ?>
        <form action="studentreg.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="user Name ">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
            <div><p>Want to go back? <a href="../website/index.php">Main Page</a></p></div>
        </form>
    </div>
</body>
</html>
