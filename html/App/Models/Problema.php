<?php
namespace App\Models;
use MF\Model\Model;

class Problema extends Model{

    protected $tb = "problemas";

    protected $idtipo;


    public function list_tipos() {
        $tipo_problema = $this->select("id,nome,descricao","tipo_problema");
        return $tipo_problema;
    }    

    public function list_problemas() {
        $tipo_problema = $this->select("id,nome,descricao",$this->__get("tb"),"id_tipo = ".$this->__get("idtipo"));
        return $tipo_problema;
    }  
}