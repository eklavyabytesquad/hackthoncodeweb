<?php

require_once 'conn.php';
require_once '../website/navbar.php';
// Fetch and display already registered employees
        echo "<br><br>";
        $sql_select = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql_select);
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Already Registered Students</h2>";
            echo "<table class='table'>";
            echo "<thead><tr><th>Full Name</th><th>Password</th><th>Action</th></tr></thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['username' ]}</td>";
                echo "<td>{$row['password']}</td>";
                echo "<td><a href='delete_employee.php?fullname=" . urlencode($row['username']) . "' class='btn btn-danger' onclick='return confirmDelete()'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No employees registered yet.</p>";
        }
        ?>