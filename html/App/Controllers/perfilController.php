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
        $obj_estado = Container::getModel('estados','instant_service');
        $perfil["estados"] = $obj_estado->list_estados();

        $this->view->dados = ['profissional' => $cadastro_profissional, 'dados' => $perfil];
        $this->render('perfil','layout1');
    }

    public function atualizar_dados() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $profissional = (isset($_POST["profissional"]))? 1 : 0;
        $obj_perfil = Container::getModel('perfil','instant_service');
        $obj_perfil->update_perfil($_SESSION["id"], $profissional, $_POST);
        header("Location: /?edit_perfil=1");
    }
}


?>
