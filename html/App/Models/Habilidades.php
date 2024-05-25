<?php 

namespace App\Models;
use MF\Model\Model;

class Habilidades extends Model{

    protected $tb = "habilidades";

    public function list_habilidades() {  
        $habilidades = $this->select("id,habilidade",$this->tb);
        return $habilidades;
    }
}
/**/