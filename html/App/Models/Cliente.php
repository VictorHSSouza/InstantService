<?php 

namespace App\Models;
use MF\Model\Model;
use App\Models\Funcoes_gerais;

class Cliente extends Model{

    protected $tb = "cliente";

    public function list_user() {
        return $this->select("nome",$this->tb);
    }

    public function cadastrar($dados) {  
        
        $indice = "";
        $valor = "";
    
        $resp_senha = Funcoes_gerais::validasenha($dados['senha']);
        if(md5($dados['senha']) != md5($dados['senha2'])) {
            $resp_senha['valida'] = false;
            $resp_senha['msg'] = "As Senhas Não São Iguais";
        } elseif(!$resp_senha['valida']) {
            $resp_senha['msg'];
        } else {
            foreach($dados as $key => $value) {
                if($key == 'senha') {
                    $indice .= $key.", tipo";
                    $valor .= "'".md5($value)."', '1'";
                    break;
                } else {
                    $indice .="$key, ";
                    $valor .="'$value', ";
                }
            }
            
            $this->insert($this->tb,$indice,$valor);
            $resp_senha['valida'] = true;
        }  
        return $resp_senha;
    }
}
/**/