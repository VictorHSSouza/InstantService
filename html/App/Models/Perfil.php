<?php
namespace App\Models;
use MF\Model\Model;

class Perfil extends Model{

    public function list_perfil($id, $verify_profissional) {
        if($verify_profissional) {
            $campo = "concat(nome, ' ' , sobrenome) nomecompleto, email, sexo, data_nascimento, cpf, 
            (SELECT e.nome_estado from estados e WHERE e.id_estado = p.id_estado) estado, p.cep, 
            p.logradouro, p.numero, p.complemento, p.bairro, p.cidade";
            $tb = "cadastro_usuario left join cadastro_profissional p on (id_cliente = p.id_usuario)";
        } else {
            $campo = "concat(nome, ' ' , sobrenome) nomecompleto, email, sexo, data_nascimento, cpf";
            $tb = "cadastro_usuario";
        }
        $where = "id_cliente = $id";

        $resposta = $this->select($campo,$tb,$where)[0];
        return $resposta;
    }
    
}