<?php 

namespace App\Models;
use MF\Model\Model;

class Avaliar extends Model{
    protected $tb = "avaliacao_profissional";

    public function listar_avaliacoes_pendentes() {
        $campo = "id_cliente,concat(nome, ' ', sobrenome) nome_completo";
        $tb = "profissional INNER JOIN cliente on (id_profissional = id_cliente)";
        $where = "status_ativo = 0 and status_cadastro = 1";
        $consulta = $this->select($campo,$tb , $where );
        return $consulta;
    }

    public function listar_avaliacao($id_pro) {
        $campo = "p.id_profissional,concat(c.nome, ' ', c.sobrenome) nome_completo,c.email,c.data_nascimento,(select nome_estado from estados e where e.id_estado = p.id_estado) estado, p.cidade, p.nome_curriculo, a.mensagem";
        $tb = "profissional p 
            INNER JOIN cliente c on (p.id_profissional = c.id_cliente) 
            LEFT JOIN avaliacao_profissional a on(a.id_profissional = p.id_profissional)";
            
        $where = "p.id_profissional = $id_pro";
        $consulta = $this->select($campo, $tb, $where)[0];
        return $consulta;
    }

    public function conf_avaliacao($id_pro) {     
        if($this->rows("id_profissional",$this->tb,"id_profissional = $id_pro") == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function ver_avaliacao($id_pro) {     
        $consulta = $this->select("mensagem",$this->tb,"id_cliente = $id_pro")[0];
        return $consulta;
    }

    public function cad_avaliacao($id_pro,$id_funcionario) {  
        $indice = "id_profissional, id_funcionario, mensagem, status_avaliacao"; 
        $valor = "$id_pro, $id_funcionario, '', 0";
        $this->insert($this->tb,$indice,$valor);
    }

    public function atualizar_avaliacao($id_pro,$msg) {     
        $this->update($this->tb,"mensagem = '$msg'","id_cliente = $id_pro");
    }

    public function completa_avaliacao($id_pro) {     
        $this->update($this->tb,"status_avaliacao = 1","id_profissional = $id_pro");
        $this->update("profissional","status_ativo = 1","id_profissional = $id_pro");
        $this->update("cliente","tipo = '2'","id_cliente = $id_pro");
    }
}   