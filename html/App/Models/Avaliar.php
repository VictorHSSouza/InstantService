<?php 

namespace App\Models;
use MF\Model\Model;

class Avaliar extends Model{

    protected $tb = 'cadastro_profissional';

    public function listar_avaliacoes_pendentes() {  
        $consulta = $this->select("id_usuario,concat(nome, ' ', sobrenome) as nome_completo", $this->tb . " INNER JOIN cadastro_usuario on (id_usuario = id_cliente)", 'status_ativo = 0 and status_cadastro = 1');
        return $consulta;
    }
}