<?php 

namespace App\Models;
use MF\Model\Model;

class Profissional extends Model{
    protected $tb = "cadastro_profissional";

    public function pg_profissional($id) {
        if($this->rows("status_ativo,status_cadastro",$this->tb,"id_usuario = $id")) {
            $info = $this->select("status_ativo,status_cadastro",$this->tb,"id_usuario = $id")[0];
            if($info['status_ativo'] == 0 && $info['status_cadastro'] == 0) {
                return 2;
            } elseif($info['status_ativo'] == 0 && $info['status_cadastro'] == 1) {
                return 3;
            } elseif($info['status_ativo'] == 1 && $info['status_cadastro'] == 1) {
                return 4;
            }
        } else {
            return 1;
        }
    }

    public function cadastrar_profissional($valores) {
        $indice = 'id_usuario';
        $valor = $_SESSION['id'];

        foreach($valores as $key => $value) {
            $indice =  $indice.", $key";
            $valor = ($key == 'id_estado')?$valor.", $value":$valor.", '$value'";
        }

        $indice = $indice.", status_ativo, status_cadastro";
        $valor = $valor.", 0, 0";

        $this->insert($this->tb,$indice,$valor);
    }

    public function status_cadastro_profissional($id,$filename = "") {    
        $this->update($this->tb,"status_cadastro = 1, nome_curriculo = '$filename' ","id_usuario = $id");
    }

    public function conferir_profissional($id) {
        if($this->rows("id_usuario",$this->tb,"id_usuario = $id")) {
            return true;
        } else {
            return false;
        }
    }
}