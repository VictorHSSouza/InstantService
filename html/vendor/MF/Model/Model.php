<?php

namespace MF\Model;
use mysqli;

abstract class Model {

    protected $db;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    protected function select($campo,$tb,$where = true) {
        $sql = "SELECT $campo FROM $tb WHERE $where";
        $stmt = $this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    protected function rows($campo,$tb,$where = true) {
        $sql = "SELECT $campo FROM $tb WHERE $where";
        $stmt = $this->db->query($sql);
        return $stmt->num_rows;
    }

    protected function insert($tb,$indice,$valor) {
        $sql = "INSERT INTO $tb ($indice) VALUES($valor)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    protected function update($tb,$valor,$where) {
        $sql = "UPDATE $tb SET $valor WHERE $where";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function delete($tb,$where = true) {
        $sql = "DELETE FROM $tb WHERE $where";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
}

