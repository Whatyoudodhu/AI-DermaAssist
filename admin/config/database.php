<?php
class Database {
    public static function connect() {
        $conn = new mysqli("localhost", "root", "", "skin_fyp");

        if ($conn->connect_error) {
            die("DB Error: " . $conn->connect_error);
        }

        return $conn;
    }
}