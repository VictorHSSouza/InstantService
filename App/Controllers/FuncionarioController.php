<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class FuncionarioController extends Action {
    public function funcionario() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();
        $obj_permissao = Container::getModel('permissao','instant_service');
        $obj_permissao->verificar_permissao(4);

        $obj_funcionario = Container::getModel('funcionario','instant_service');
        $this->view->funcionarios = $obj_funcionario->list_funcionarios();
        
        $this->render('funcionario', 'layout1');
    }

    public function funcionario_cadastro() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();
        $obj_permissao = Container::getModel('permissao','instant_service');
        $obj_permissao->verificar_permissao(4);
        
        $this->render('funcionario_cadastro', 'layout1');
    }

    public function cadastrar_funcionario() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();
        $obj_permissao = Container::getModel('permissao','instant_service');
        $obj_permissao->verificar_permissao(4);

        //var_dump($_POST);
        $obj_funcionario = Container::getModel('funcionario','instant_service');
        $obj_funcionario->cadastrar_funcionario($_POST);
 
        Header("Location: /funcionario");
    }

    public function excluir_funcionario() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();
        $obj_permissao = Container::getModel('permissao','instant_service');
        $obj_permissao->verificar_permissao(4);

        $obj_funcionario = Container::getModel('funcionario','instant_service');
        $obj_funcionario->excluir_funcionario($_GET['id']);
 
        Header("Location: /funcionario");
    }
}
?>