<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {
    
    public function index() {
        session_start();
        if(isset($_SESSION['id'])) {
            $obj = Container::getModel('login','instant_service');
            $obj->Login();

            $pedido = Container::getModel('pedido','instant_service');
            $pedido->__set('id_cliente',$_SESSION['id']);

            $pedidos = $pedido->list_pedidos();
            $this->view->pedidos = $pedidos;
            $this->view->nome = $_SESSION['nome'];
        }

        $this->render('home','layout1');
    }

    public function sobre_nos() {
        session_start();
        if(isset($_SESSION['id'])) {
            $obj = Container::getModel('login','instant_service');
            $obj->Login();

            $pedido = Container::getModel('pedido','instant_service');
            $pedido->__set('id_cliente',$_SESSION['id']);

            $pedidos = $pedido->list_pedidos();
            $this->view->pedidos = $pedidos;
            $this->view->nome = $_SESSION['nome'];
        }

        $this->render('sobre_nos','layout1');
    }
}

?>
