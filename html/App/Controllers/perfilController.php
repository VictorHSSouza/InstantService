<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class PerfilController extends Action {

    public function perfil() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        echo "PerfilController: dar a opção de auterar informações de usuario: nome, login, senha... <br> e de profissional: região, habilidades...";
    }

}

?>
