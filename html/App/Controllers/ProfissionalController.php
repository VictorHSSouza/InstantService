<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class ProfissionalController extends Action {
    public function Profissional() {
        $obj = Container::getModel('profissional','instant_service');
        $profissional = $obj->list_profissional();
        $this->view->dados = $profissional;
        $this->render('profissional','layout1');
    }

    public function cadastrar_profissional() {
        $obj = Container::getModel('cadastrar_profissional','instant_service');
        $obj->cadastrar($_POST);
        Header("Location: /");
    }
}

?>
