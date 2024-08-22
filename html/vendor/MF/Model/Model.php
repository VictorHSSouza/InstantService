<?php

namespace MF\Model;
use mysqli;

abstract class Model {

    protected $db;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo,$valor) {
        $this->$atributo = $valor;
    }

    protected function select($campo,$tb,$where = true,$extra = "") {
        $sql = "SELECT $campo FROM $tb WHERE $where $extra";
        //echo "<br> $sql <br>";
        $stmt = $this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    protected function rows($campo,$tb,$where = true) {
        $sql = "SELECT $campo FROM $tb WHERE $where";
        //echo $sql;
        $stmt = $this->db->query($sql);
        return $stmt->num_rows;
    }

    protected function insert($tb,$indice,$valor) {
        $sql = "INSERT INTO $tb ($indice) VALUES($valor)";
        //echo $sql;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    protected function update($tb,$valor,$where) {
        $sql = "UPDATE $tb SET $valor WHERE $where";
        //echo $sql;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    protected function delete($tb,$where = true) {
        $sql = "DELETE FROM $tb WHERE $where";
        //echo $sql;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    protected function lastId() {
        return $this->db->insert_id;
    }
}

