<?php
    require './db/db.php';

    header("Access-Control-Allow-Origin: *");

    $routes = array(
        '/',
        '/users',
        '/books'
    );

    function router($routes, $conn) {
        foreach ($routes as $path) {
            if (isset($_SERVER['PATH_INFO'])) {
                $endpoint = $_SERVER['PATH_INFO'];
            } else {
                $endpoint = '/';
            }

            if ($path == $endpoint) {
                search($path, $conn);
                return;
            }
        }

        mysqli_close($conn);
        echo 'Sorry! Page not found';
    }

    router($routes, $conn);
?> 