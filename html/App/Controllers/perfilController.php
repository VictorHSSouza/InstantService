<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class PerfilController extends Action {

    public function perfil() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $obj_profissional = Container::getModel('profissional','instant_service');
        $cadastro_profissional = $obj_profissional->conferir_profissional($_SESSION["id"]);
        $obj_perfil = Container::getModel('perfil','instant_service');
        $perfil = $obj_perfil->list_perfil($_SESSION["id"], $cadastro_profissional);

        $this->view->dados = ['profissional' => $cadastro_profissional, 'dados' => $perfil];
        $this->render('perfil','layout1');
    }

}

?>
