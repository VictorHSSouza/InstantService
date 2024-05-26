<?php 

namespace App\Models;
use MF\Model\Model;

class Avaliar extends Model{
    protected $tb = "avaliacao";

    public function listar_avaliacoes_pendentes() {
        $campo = "id_usuario,concat(nome, ' ', sobrenome) nome_completo";
        $tb = "cadastro_profissional INNER JOIN cadastro_usuario on (id_usuario = id_cliente)";
        $where = "status_ativo = 0 and status_cadastro = 1";
        $consulta = $this->select($campo,$tb , $where );
        return $consulta;
    }

    public function listar_avaliacao($id_pro) {
        $campo = "p.id_usuario,concat(u.nome, ' ', u.sobrenome) nome_completo,u.email,u.data_nascimento,(select nome_estado from estados e WHERE e.id_estado = p.id_estado) estado, p.cidade, p.nome_curriculo, a.mensagem";
        $tb = "cadastro_profissional p INNER JOIN cadastro_usuario u on (p.id_usuario = u.id_cliente) LEFT JOIN avaliacao a on(a.id_usuario = p.id_usuario)";
        $where = "p.id_usuario = $id_pro";
        $consulta = $this->select($campo, $tb, $where)[0];
        return $consulta;
    }

    public function conf_avaliacao($id_pro) {     
        if($this->rows("id_usuario",$this->tb,"id_usuario = $id_pro") == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function ver_avaliacao($id_pro) {     
        $consulta = $this->select("mensagem",$this->tb,"id_usuario = $id_pro")[0];
        return $consulta;
    }

    public function cad_avaliacao($id_pro,$id_funcionario) {  
        $indice = "id_usuario, id_funcionario, mensagem, status_avaliacao"; 
        $valor = "$id_pro, $id_funcionario, '', 0";
        $this->insert($this->tb,$indice,$valor);
    }

    public function atualizar_avaliacao($id_pro,$msg) {     
        $this->update($this->tb,"mensagem = '$msg'","id_usuario = $id_pro");
    }

    public function completa_avaliacao($id_pro) {     
        $this->update($this->tb,"status_avaliacao = 1","id_usuario = $id_pro");
        $this->update("cadastro_profissional","status_ativo = 1","id_usuario = $id_pro");
    }
}