<?php 

namespace App\Models;
use MF\Model\Model;

class Permissao extends Model{
    protected $tb = "permissao";

    public function verificar_permissao($nivel) {

        if(!isset($_SESSION['tipo']) or $_SESSION['tipo']<$nivel){
            Header("Location: /");
        }
    }

    public function list_permissao() {

        $consulta = $this->select('id, nome, descricao',$this->tb);
        return $consulta;
    }
}   