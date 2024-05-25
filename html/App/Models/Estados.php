<?php 

namespace App\Models;
use MF\Model\Model;

class Estados extends Model{
    protected $tb = "estados";

    public function list_estados() {  
        $estados = $this->select("id_estado, nome_estado", $this->tb);
        
        return $estados;
    }

}