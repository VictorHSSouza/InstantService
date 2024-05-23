<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use stdClass;

class TesteController extends Action {
    public function teste() {
        $obj = Container::getModel('habilidades','instant_service');
        $habilidades = $obj->list_habilidades();
        $this->view->dados = $habilidades;
        $this->render('habilidades','layout1');
    }
}

?>
