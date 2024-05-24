<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class LoginController extends Action {
    public function Login() {
        $this->render('login','layout1');
    }

    public function Logar() {
        //$this->render('login','layout1');
        header("Location: /");
    }
}

?>
