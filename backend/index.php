<?php
    require './db/connection.php';
    require './model/user.php';
    require './model/book.php';

    header("Access-Control-Allow-Origin: *");

    $routes = array(
        '/',
        'users',
        'books'
    );

    function instance_model($path, $conn) {
        $model = null;    

        switch($path) {
            case 'users':
                $model =  new User($conn);
                break;
            case 'books':
                $model =  new Book($conn);
                break;
        }

        return $model;
    }

    function router($routes, $conn) {
        if (isset($_SERVER['PATH_INFO'])) {
            $endpoint = explode('/', $_SERVER['PATH_INFO']);
        } else {
            $endpoint = '/';
        }

        if (in_array($endpoint[1], $routes)) {
            $method = $_SERVER['REQUEST_METHOD'];
            $model = instance_model($endpoint[1], $conn);

            switch ($method) {
                case 'GET':
                    $model->read();
                    break;
                case 'POST':
                    $model->create($_POST);
                    break;
                case 'DELETE':
                    $model->delete($endpoint[2]);
                    break;
            }
            
            return;
        }

        mysqli_close($conn);
        echo 'Sorry! Page not found';
    }

    router($routes, $conn);
?> 