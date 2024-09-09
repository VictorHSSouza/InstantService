<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use App\Models\Correio;

class ProfissionalController extends Action {
    public function profissional() {
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
                if(isset($_SESSION['id'])) {        
                    $pedido = Container::getModel('pedido','instant_service');
                    $pedido->__set('id_cliente',$_SESSION['id']);
        
                    $pedidos = $pedido->list_servicos();
                    $this->view->pedidos = $pedidos;
                    $this->view->nome = $_SESSION['nome'];
                }

                $this->render('area_profissional','layout1');
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

    public function profissional_pedidos_vinculados() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $obj_pedido = Container::getModel('pedido','instant_service');
        $obj_pedido->__set('id_profissional',$_SESSION['id']);

        $pedidos = $obj_pedido->list_servicos_vinculados();
        $this->view->pedidos = $pedidos;

        $this->render('profissional_pedidos_vinculados', 'layout1');
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

    public function api_correio() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $cep = $_GET['cep'];

        $caracteres = ['.','-'];
        $cep = str_replace($caracteres,'',$cep);

        $info = Correio::list_endereco($cep);

        $estado = Container::getModel('estados','instant_service');
        $estado->__set('identificador',json_decode($info)->uf);
        $uf = $estado->select_estado();

        $this->view->info = $uf."/".$info;
        $this->render('info_cep','');
    }
}
?>
