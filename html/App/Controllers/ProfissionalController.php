<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use stdClass;

class ProfissionalController extends Action {
    public function Profissional() {
        $obj = Container::getModel('profissional','instant_service');
        $profissional = $obj->list_profissional();
        $this->view->dados = $profissional;
        $this->render('profissional','layout1');
    }
}

?>
