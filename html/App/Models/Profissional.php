<?php 

namespace App\Models;
use MF\Model\Model;

class Profissional extends Model{
    public function list_profissional() {  
        $query = "SELECT * FROM cadastro_profissional";
        $retorno = $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
        return $retorno;
    }

    public function cadastrar_profissional() {
        if(isset($_POST['cadfim'])) {
            var_dump($_FILES);
            if($_FILES['pdfadd']['name']) {
                $uploaddir = 'assets/arquivos/';
                $filename = basename($_FILES['pdfadd']['name']);
                $arquivo = $uploaddir . $filename;
                //echo $arquivo;
                if (!move_uploaded_file($_FILES['pdfadd']['tmp_name'], $arquivo)) {
                    echo "erro";
                }
            }
        
            $this->update('cadastro_profissional',"status_cadastro = 1","id_usuario = ".$_SESSION['id_usuario']);
            Header("Location: home.php?cad_prof=1");
        } elseif($this->rows('*', 'cadastro_profissional', 'id_usuario = ' . $_SESSION['id_usuario']) == 1 && $this->rows('*', 'cadastro_profissional', 'status_cadastro = 0 and id_usuario = ' . $_SESSION['id_usuario']) == 1) {
            $habilidades = $this->select("id,habilidade","habilidades");
            $habilidades_cad = $this->select("GROUP_CONCAT(id_habilidade) as habilidades","profissional_habilidades","id_profissional=".$_SESSION['id_usuario']);
        
            if(isset($habilidades_cad['habilidades'])) {
                $habilidades_cad = explode(",",$habilidades_cad['habilidades']);
                $new_habilidades_cad = [];
                foreach($habilidades_cad as  $valor) {
                    $new_habilidades_cad[$valor] = 0;
                }
            }
        }
    }
}
/**/