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

        function read() {
            $items = [];
            $result = mysqli_query($this->conn, "select * from books");

            while ($row = mysqli_fetch_assoc($result)) {
                array_push($items, $row);
            }
            
            echo json_encode($items);
        }

        function create() {
            echo json_encode('ESTOU FUNCIONANDO');
        }

        function __destruct() {
            mysqli_close($this->conn);
        }
    }