<?php
session_start();
if (isset($_SESSION["users"])) {
   header("Location: ../Dashboard/main.php"); // Redirect to dashboard.php in the transport directory
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEXUS LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
       .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #f8f9fa; /* Light gray background */
        }
        .card-title {
            color: #007bff; /* Blue color for title */
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="max-width: 400px;">
            <h2 class="card-title text-center mb-4"> Welcome To SRM TECHWIZ</h2>
            <?php
            if (isset($_POST["login"])) {
                if (isset($_POST["username"]) && isset($_POST["password"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    require_once "conn.php";
                    $sql = "SELECT * FROM users WHERE username = ?";
                    $stmt = mysqli_stmt_init($conn);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if ($result) {
                            $users = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            if ($users) {
                                // Compare entered password with the password from the database
                                if ($password === $users["password"]) {
                                    $_SESSION["users"] = "yes";
                                    $_SESSION["username"] = $username; // Set the username in session
                                    echo "<script>alert('Login successful'); window.location.href='../Dashboard/main.php';</script>";
                                    exit();
                                } else {
                                    echo "<div class='alert alert-danger text-center'>Password does not match</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger text-center'>Student not Registered Yet</div>";
                            }
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    }
                }
            }
            ?>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" placeholder="Enter Full Name" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" class="form-control">
                </div>
                <div class="d-grid">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
            </form>
            <div class="mt-3 text-center">
                <p>Not registered yet? <a href="studentreg.php">Register YourSelf</a></p>
                <p>Go back to <a href="../website/index.php">Home Page</a></p>
                <p>FOR ADMIN  <a href="admin.php">ADMIN PANEL</a></p>
            </div>
        </div>
    </div>
</body>
</html>