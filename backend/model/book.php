<?php
    class Book {
        private $conn;
        private $columns = [
            'name',
            'user_id'
        ];

        function __construct($conn) {
            $this->conn = $conn;
        }

        function index() {
            $items = [];
            $result = mysqli_query($this->conn, "select * from books");

            while ($row = mysqli_fetch_assoc($result)) {
                array_push($items, $row);
            }
            
            echo json_encode($items);
        }

        function create($request) {            
            $result = mysqli_query(
                $this->conn, 
                "insert into books (name) values (
                    '{$request['name']}'
                )"
            );

            if ($result) {
                echo json_encode(['status' => 200]);
                return;
            }

            echo json_encode(['status' => 500]);
        }

        function delete($book_id) {
            $result = mysqli_query(
                $this->conn, 
                "delete from books where id = $book_id"
            );

            if ($result) {
                echo json_encode(['status' => 200]);
                return;
            }

            echo json_encode(['status' => 500]);
        }

        function __destruct() {
            mysqli_close($this->conn);
        }
    }