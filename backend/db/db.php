<?php

    class DB {
        private $TABLE;
        private $CONN;

        function __construct($table, $conn) {
            $this->TABLE = self::sanitize_table($table);
            $this->CONN = $conn;
        }

        function search() {
            if (strlen($this->TABLE)) {
                $items = [];
                $result = mysqli_query($this->CONN, "select * from {$this->TABLE}");

                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($items, $row);
                }
                
                echo json_encode($items);
            }

            mysqli_close($this->CONN);
        }

        private function sanitize_table($path) {
            return str_replace('/', '', $path);
        }
    }