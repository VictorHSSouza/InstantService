<?php 

namespace App\Models;
use MF\Model\Model;

class Usuario extends Model{
    public function list_user() {  
        $query = "SELECT nome FROM cadastro_usuario";
        $retorno = $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
        return $retorno;
    }
}
/**/