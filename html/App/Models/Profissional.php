<?php 

namespace App\Models;
use MF\Model\Model;

class Profissional extends Model{
    public function list_profissional() {  
        $query = "SELECT * FROM cadastro_profissional";
        $retorno = $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
        return $retorno;
    }
}
/**/