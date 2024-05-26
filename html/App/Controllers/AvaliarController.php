<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AvaliarController extends Action {

    public function avaliar() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $obj = Container::getModel('avaliar','instant_service');
        $avaliacao = $obj->listar_avaliacoes_pendentes();
        $this->view->dados = $avaliacao;
        $this->render('avaliar','layout1');
    }

    public function avaliar_profissional() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $obj = Container::getModel('avaliar','instant_service');
        $avaliacao = $obj->listar_avaliacao($_GET['id']);
        $this->view->dados = $avaliacao;
        $this->render('avaliar_profissional','layout1');
    }

    public function avaliar_envio() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();
        var_dump($_POST);

        $obj = Container::getModel('avaliar','instant_service');
        $avaliacao = $obj->conf_avaliacao($_GET['id']);

        if(!$avaliacao) {
            $obj->cad_avaliacao($_GET['id'],$_SESSION['id']);
        }

        if($_POST['msg']) {
            $avaliacao = $obj->atualizar_avaliacao($_GET['id'],$_POST['msg']);
        }

        if(isset($_POST['status'])) {
            $avaliacao = $obj->completa_avaliacao($_GET['id']);
        }

        Header("Location: /avaliar");
    }
}

?>
