<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class CadastrarController extends Action {
    public function Cadastrar() {
        $this->render('cadastrar','layout1');
    }

    public function Registrar() {
        //$this->render('cadastrar','layout1');
        $obj = Container::getModel('cadastrar','instant_service');
        $obj->cadastrar($_POST);
        Header("Location: login");
    }
}

?>
