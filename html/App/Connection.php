<?php

namespace App;

class Connection {
    
    public static function getDb($db) {
        $host = "localhost";
        $user = "instant_service";
        $psw = "6DD_dC6C0l24-D@8";

        $conn = mysqli_connect ($host, $user, $psw, $db);
        $conn->set_charset("utf8");

        if(!$conn) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        } else {
            return $conn;
        }  
    }
}

