<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AvaliarController extends Action {

    public function avaliar() {
        $obj = Container::getModel('avaliar','instant_service');
        $avaliacao = $obj->listar_avaliacoes_pendentes();
        $this->view->dados = $avaliacao;
        $this->render('avaliar','layout1');
    }

    public function avaliar_profissional() {
        $obj = Container::getModel('avaliar','instant_service');
        $avaliacao = $obj->listar_avaliacoes_pendentes();
        $this->view->dados = $avaliacao;
        $this->render('avaliar','layout1');
    }
}

?>
