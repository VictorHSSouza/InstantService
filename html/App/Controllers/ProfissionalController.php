<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class ProfissionalController extends Action {
    public function Profissional() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $obj_profissional = Container::getModel('profissional','instant_service');
        $pagina = $obj_profissional->pg_profissional($_SESSION['id']);
        
        switch ($pagina) {
            case 1:
                $obj_estado = Container::getModel('estados','instant_service');
                $estados = $obj_estado->list_estados();

                $this->view->dados = ['estados'=>$estados];
                $this->render('profissional_cadastro','layout1');
                break;
            case 2:
                $obj_habilidade = Container::getModel('habilidades','instant_service');
                $habilidades = $obj_habilidade->list_habilidades();

                $obj_prof_habilidade = Container::getModel('profissional_habilidades','instant_service');
                $habilidades_cad = $obj_prof_habilidade->list_prof_habilidades($_SESSION['id']);

                $this->view->dados = ['habilidades'=>$habilidades,'habilidades_prof'=>$habilidades_cad];
                $this->render('profissional_habilidades','layout1');
                break;
            case 3:
                $obj = Container::getModel('avaliar','instant_service');
                $conf = $obj->conf_avaliacao($_SESSION['id']);
                
                if($conf) {
                    $avaliacao = $obj->ver_avaliacao($_SESSION['id']);
                    $this->view->dados = $avaliacao;
                }
                $this->render('profissional_avaliando','layout1');
                break;
            case 4:
                echo "Tela de profissional";
                break;
        }
    }

    public function profissional_cadastro() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $obj_profissional = Container::getModel('profissional','instant_service');
        $obj_profissional->cadastrar_profissional($_POST);
 
        Header("Location: /profissional");
    }

    public function profissional_habilidades_cadastro() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $obj_prof_habilidade = Container::getModel('profissional_habilidades','instant_service');
        $obj_prof_habilidade->cad_prof_habilidades($_GET['id_habilidade'],$_GET['status_habilidade'],$_SESSION['id']);
    }

    public function profissional_habilidades() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        if($_FILES['pdfadd']['name']) {
            $rootDir = $_SERVER['DOCUMENT_ROOT'];
            $uploaddir = $rootDir . '/public/assets/pdf/';
            $filename = basename($_FILES['pdfadd']['name']);
            $arquivo = $uploaddir . $filename;
            if (!move_uploaded_file($_FILES['pdfadd']['tmp_name'], $arquivo)) {
                echo "erro";
            }
        }
        $filename = (isset($filename))?$filename:"";

        $obj_profissional = Container::getModel('profissional','instant_service');
        $obj_profissional->status_cadastro_profissional($_SESSION['id'],$filename);
        
        Header("Location: /?cad_prof=1");
    }
}

?>
