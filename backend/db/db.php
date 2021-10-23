<?php
    require "env.php";

    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    function sanitize_table($path) {
        return str_replace('/', '', $path);
    }

    function search($table, $conn) {
        $table = sanitize_table($table);

        if (strlen($table)) {
            $items = [];
            $result = mysqli_query($conn, "select * from $table");

            while ($row = mysqli_fetch_assoc($result)) {
                array_push($items, $row);
            }
            
            echo json_encode($items);
        }

        mysqli_close($conn);
    }
?> 