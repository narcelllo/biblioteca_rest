<?php
    class User {
        private $conn;
        private $columns = [
            'name',
            'birth_date',
            'cpf',
            'email'
        ];

        function __construct($conn) {
            $this->conn = $conn;
        }

        function index() {
            $items = [];
            $result = mysqli_query($this->conn, "select * from users");

            while ($row = mysqli_fetch_assoc($result)) {
                array_push($items, $row);
            }
            
            echo json_encode($items);
        }

        function create($request) {            
            $result = mysqli_query(
                $this->conn, 
                "insert into users (name, birth_date, cpf, email) values (
                    '{$request['name']}',
                    '{$request['birth_date']}',
                    '{$request['cpf']}',
                    '{$request['email']}'
                )"
            );

            if ($result) {
                echo json_encode(['status' => 200]);
                return;
            }

            echo json_encode(['status' => 500]);
        }

        function delete($user_id) {
            $result = mysqli_query(
                $this->conn, 
                "delete from users where id = $user_id"
            );

            if ($result) {
                echo json_encode(['status' => 200]);
                return;
            }

            echo json_encode(['status' => 500]);
        }

        function show($user_id){
            echo 'show';
        }

        function __destruct() {
            mysqli_close($this->conn);
        }
    }