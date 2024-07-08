<?php 

namespace App\Models;
use MF\Model\Model;

class Estados extends Model{
    protected $tb = "estados";

    protected $identificador;

    public function list_estados() {  
        $estados = $this->select("id_estado, nome_estado", $this->tb);
        
        return $estados;
    }

    public function select_estado() {  
        $where = is_int($this->identificador)?"id_estado = ".$this->identificador:"nome_estado = '".$this->identificador."'";
        $select = is_int($this->identificador)?"nome_estado":"id_estado";
        
        $info = $this->select($select, $this->tb,$where)[0][$select];
        
        return $info;
    }

}