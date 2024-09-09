<?php
namespace App\Models;
use MF\Model\Model;

class Perfil extends Model{

    public function list_perfil($id, $verify_profissional) {
        if($verify_profissional) {
            $campo = "concat(nome, ' ' , sobrenome) nomecompleto, email, sexo, data_nascimento, cpf, 
            p.id_estado, p.cep, 
            p.logradouro, p.numero, p.complemento, p.bairro, p.cidade";
            $tb = "cliente left join profissional p on (id_cliente = p.id_profissional)";
        } else {
            $campo = "concat(nome, ' ' , sobrenome) nomecompleto, email, sexo, data_nascimento, cpf";
            $tb = "cliente";
        }
        $where = "id_cliente = $id";

        $resposta = $this->select($campo,$tb,$where)[0];
        return $resposta;
    }

    public function update_perfil($id, $profissional, $valores) {
        $this->update("cliente", "email = '" . $valores["email"]. "'", "id_cliente = $id");

        if($profissional) {
            $this->update("profissional", 
                "id_estado = " . $valores["id_estado"] . 
                ",cep='" . $valores["cep"] .
                "',logradouro='" . $valores["logradouro"] . 
                "',numero='" . $valores["numero"] . 
                "',complemento='" . $valores["complemento"] . 
                "',bairro='" . $valores["bairro"] . 
                "',cidade='" . $valores["cidade"] . "'"
                , "id_profissional = $id");
        }

    }
    
}