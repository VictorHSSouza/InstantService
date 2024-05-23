<?php 

namespace App\Models;
use MF\Model\Model;

class Habilidades extends Model{

    protected $tb = "habilidades";

    public function list_habilidades() {  
        $campo = "id,habilidade";
        $retorno = $this->select($campo,$this->tb);
        return $retorno;
    }
}
/**/