<?php
    $host = "localhost";
    $database = "payroll_system";
    $user = "root";
    $password = "";
    $conn = mysqli_connect($host, $user, $password, $database);

    // Check connection
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>