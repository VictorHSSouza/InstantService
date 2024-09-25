<?php 

namespace App\Models;
use MF\Model\Model;

class Cliente extends Model{

    protected $tb = "cliente";

    public function list_user() {
        return $this->select("nome",$this->tb);
    }

    public function cadastrar($dados) {  
        
        $indice = "";
        $valor = "";
    
        if(md5($dados['senha']) == md5($dados['senha2'])) {
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
            return true;
        } else {
            return false;
        }
    }
}
/**/