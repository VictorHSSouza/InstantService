<?php 

namespace App\Models;
use MF\Model\Model;

class Cadastrar extends Model{

    public function cadastrar($Dados) {  
        
        $indice = "";
        $valor = "";

        foreach($Dados as $key => $value) {
            if($key == 'nome') {
                $indice = $key;
                $valor = "'$value'";
            } elseif($key == 'login') {
                break;
            } elseif($key == 'email') {

            } else {
                $indice = $indice.", $key";
                $valor = $valor.", '$value'";
            }
        }

        $this->insert('cadastro_usuario',$indice,$valor);
    
        if(md5($Dados['senha']) == md5($Dados['senha2'])) {
            $indice = "tipo,login,senha,email,id_usuario";
            $valor = "'U','".$Dados['login']."','".md5($Dados['senha'])."','".$Dados['email']."', ". $this->lastId();
            $this->insert('login',$indice,$valor);
        }
    }
}