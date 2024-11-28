<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use App\Models\Email;

class CadastrarController extends Action {
    public function cadastrar() {
        $this->render('cadastrar','layout2');
    }

    public function registrar() {
        ob_start();
        //$this->render('cadastrar','layout1');
        $obj = Container::getModel('cliente','instant_service');
        $stts = $obj->cadastrar($_POST);

        if($stts['valida']) {
            $email = new Email;
            $email->__set("email_destinatario",$_POST['email']);
            $email->__set("nome_destinatario",$_POST['nome']);
            $email->email_cad_user();
    
            Header("Location: login");
        } else {
            $this->view->dados = $_POST;
            $this->view->alert = $stts['msg'];
            $this->render('cadastrar','layout2');
        }   
    }
}

?>
