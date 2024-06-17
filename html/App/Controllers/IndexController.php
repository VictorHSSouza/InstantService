<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {
    
    public function Index() {
        session_start();
        if(isset($_SESSION['id'])) {
            $obj = Container::getModel('login','instant_service');
            $obj->Login();

            $pedido = Container::getModel('pedido','instant_service');
            $pedido->__set('id_usuario',$_SESSION['id']);

            $pedidos = $pedido->list_pedidos();
            $this->view->pedidos = $pedidos;
        }

        $this->render('home','layout1');
    }
}

?>
