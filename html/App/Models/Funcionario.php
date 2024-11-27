<?php 

namespace App\Models;
use MF\Model\Model;

class Funcionario extends Model{
    protected $tb = "cliente";

    public function list_funcionarios() {
        $campos = "id_cliente, concat(nome, ' ', sobrenome) as nome_completo, email, data_nascimento, cpf, sexo, tipo";
        $where = "tipo in(3, 4)";
        $extra = "order by tipo, id_cliente";

        $funcionarios = $this->select($campos,$this->tb,$where,$extra);
        return $funcionarios;
    }

    public function cadastrar_funcionario($dados) {  
        
        $indice = "";
        $valor = "";
    
        if(md5($dados['senha']) == md5($dados['senha2'])) {
            foreach($dados as $key => $value) {
                if($key == 'senha') {
                    $indice .= $key;
                    $valor .= "'".md5($value)."'";
                    break;
                } else {
                    $indice .="$key, ";
                    $valor .="'$value', ";
                }
            }
            
            $this->insert($this->tb,$indice,$valor);
            return true;
        } else {
            return false;
        }
    }

    public function excluir_funcionario($id) {
        $this->delete($this->tb, "id_cliente = $id");
    }
}