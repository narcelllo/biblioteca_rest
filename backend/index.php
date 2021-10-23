<?php
    require './db/connection.php';
    require './model/user.php';

    header("Access-Control-Allow-Origin: *");

    $routes = array(
        '/',
        '/users',
        '/books'
    );

    function instance_model($path, $conn) {
        $model = null;    

        switch($path) {
            case '/users':
                $model =  new User($conn);
                break;
            case '/books':
                $model =  new Book($conn);
                break;
        }

        return $model;
    }

    function router($routes, $conn) {
        foreach ($routes as $path) {
            if (isset($_SERVER['PATH_INFO'])) {
                $endpoint = $_SERVER['PATH_INFO'];
            } else {
                $endpoint = '/';
            }

            if ($path == $endpoint) {
                $method = $_SERVER['REQUEST_METHOD'];
                $model = instance_model($path, $conn);

                switch ($method) {
                    case 'GET':
                        $model->read();
                        break;
                    case 'POST':
                        $model->create();
                        break;
                }
                
                return;
            }
        }

        mysqli_close($conn);
        echo 'Sorry! Page not found';
    }

    router($routes, $conn);
?> 