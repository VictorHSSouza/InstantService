<?php
namespace App\Models;
use MF\Model\Model;

class Problema extends Model{

    protected $tb = "problemas";

    protected $id_tipo;


    public function list_tipos() {
        $tipo_problema = $this->select("id_tipo,nome,descricao","tipo_problema");
        return $tipo_problema;
    }    

    public function list_problemas() {
        $tipo_problema = $this->select("id_problema,nome,descricao",$this->tb,"id_tipo = ".$this->id_tipo);
        return $tipo_problema;
    }  
}