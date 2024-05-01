<?php   
    class BD {  
        public $pdo;

        function __construct() {
            $host = 'localhost';
            $dbname = 'instant_service';
            $username = 'root';
            $password = '';
            try {
                $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                #echo "Connected successfully";
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }     
        }

        public function select($campo,$tb,$where = true) {
            $sql = "SELECT $campo FROM $tb WHERE $where";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert($tb,$indice,$valor) {
            $sql = "INSERT INTO $tb ($indice) VALUES($valor)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

        public function update($tb,$valor,$where) {
            $sql = "UPDATE $tb SET $valor WHERE $where";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

        public function delete($tb,$where = true) {
            $sql = "DELETE FROM $tb WHERE $where";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
    }
?>