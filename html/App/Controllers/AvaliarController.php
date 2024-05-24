<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AvaliarController extends Action {

    public function avaliar() {
        $obj = Container::getModel('avaliar','instant_service');
        $obj->listar_avaliacoes_pendentes();
    }
}

?>
