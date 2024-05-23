<?php

namespace App\Controllers;

use MF\Controller\Action;
use App\Models\Aluno;
use App\Models\ApiEscolaweb;
use App\Models\Funcoes_gerais;
use App\Models\Info;
use MF\Model\Container;
use stdClass;

class indexController extends Action {
    
    public function index() {
        $this->render('home','layout1');
    }
}

?>
