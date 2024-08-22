<?php 

namespace App\Models;
use MF\Model\Model;

class Profissional_habilidades extends Model{

    protected $tb = "profissional_habilidades";

    public function list_prof_habilidades($id) {  
        $habilidades_cad = $this->select("GROUP_CONCAT(id_habilidade) as habilidades",$this->tb,"id_profissional= $id")[0];

        $new_habilidades_cad = [];
        if(isset($habilidades_cad['habilidades'])) {
            $habilidades_cad = explode(",",$habilidades_cad['habilidades']);
            foreach($habilidades_cad as $valor) {
                $new_habilidades_cad[$valor] = 0;
            }
        }

        return $new_habilidades_cad;
    }

    public function cad_prof_habilidades($id_habilidade,$status_habilidade,$id) {  
        date_default_timezone_set('America/Sao_Paulo');
    
        if($status_habilidade== 0) {
            $indice = 'id_profissional,id_habilidade,data';
            $valor = $id.",".$id_habilidade.",'".date("Y-m-d")."'";
            $this->insert($this->tb,$indice,$valor);

        } elseif($status_habilidade== 1) {
            $this->delete($this->tb,'id_profissional = '.$id.' and id_habilidade = '.$id_habilidade);
        }           
    }

    public function list_prof_email($id_problema) {
        $campo = "email, nome";

        $tb = "LOGIN L JOIN CADASTRO_USUARIO ON(L.ID_USUARIO = ID_CLIENTE)
		JOIN CADASTRO_PROFISSIONAL CP ON(CP.ID_USUARIO = ID_CLIENTE)
		JOIN PROFISSIONAL_HABILIDADES PFH ON(CP.ID_USUARIO = ID_PROFISSIONAL)
        JOIN HABILIDADES ON (PFH.ID_HABILIDADE = ID)
        JOIN PROBLEMA_HABILIDADES PBH ON(ID = PBH.ID_HABILIDADE)";

        $where = "PBH.ID_PROBLEMA = $id_problema";

        $extra = "GROUP BY L.ID_USUARIO";

        $email_profissional = $this->select($campo, $tb, $where, $extra);

        return $email_profissional;
    }
}