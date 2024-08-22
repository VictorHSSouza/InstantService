<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use App\Models\Email;

class CadastrarController extends Action {
    public function Cadastrar() {
        $this->render('cadastrar','layout2');
    }

    public function Registrar() {
        ob_start();
        //$this->render('cadastrar','layout1');
        $obj = Container::getModel('cadastrar','instant_service');
        $obj->cadastrar($_POST);

        $email = new Email;
        $email->__set("email_destinatario",$_POST['email']);
        $email->__set("nome_destinatario",$_POST['nome']);
        $email->email_cad_user();

        Header("Location: login");
    }
}

?>
