<?php

namespace MF\Model;

use App\Connection;

class Container {

    public static function getModel($model,$db) {
        $class = "\\App\\Models\\".ucfirst($model);
        $conn = Connection::getDb($db);
        return new $class($conn);   
    }
    
}