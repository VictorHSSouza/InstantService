<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class LoginController extends Action {
    public function Login() {
        if(isset($_GET['fail'])) {
            $this->view->dados = ['erro' => 1];
        }
        $this->render('login','layout2');
    }

    public function Logar() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login($_POST['login'],md5($_POST['senha']),true);
        header("Location: /");
    } 
}

?>
