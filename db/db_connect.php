<?php
    require "env.php";

    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?> 