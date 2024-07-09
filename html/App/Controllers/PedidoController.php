<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class PedidoController extends Action {
    public function fazer_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $problema = Container::getModel('problema','instant_service');
        $tipo_problema = $problema->list_tipos();

        $this->view->dados = $tipo_problema;
        $this->render('fazer_pedido','layout1');
    }

    public function list_problemas() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        if(!isset($_GET['id']) or !$_GET['id']) {
            header("Location: /");
            exit;
        }

        $problema = Container::getModel('problema','instant_service');
        $problema->__set("id_tipo",$_GET['id']);

        $problemas = $problema->list_problemas();
        foreach($problemas as $value) {
            echo "<option value='".$value['id']."'>".$value['nome']."</option>";
        }
    }

    public function cad_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        if(!isset($_POST['id_problema']) or !$_POST['id_problema']) {
            header("Location: /");
            exit;
        }

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_usuario',$_SESSION['id']);
        $pedido->__set('id_problema',$_POST['id_problema']);
        $pedido->__set('descricao',$_POST['descricao']);
        $pedido->__set('endereco',$_POST['endereco']);

        $pedido->cad_pedido();

        $email = Container::getModel('email','instant_service');

        $email->__set('assunto','Solicitação de Serviço');
        $email->__set('corpo','<b>Olá! Um novo <b style="color:red">pedido</b> de serviço foi solicitado perto da sua região.</b><br>Confira nosso site para saber mais sobre o pedido!');

        header("Location: /?pedido=1");
        $email->enviar_email();
    }

    public function ver_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        if(!isset($_GET['id']) or !$_GET['id']) {
            header("Location: /");
            exit;
        }

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_pedido',$_GET['id']);
        $pedido->__set('id_usuario',$_SESSION['id']);
        
        $pedidoinfo = $pedido->ver_pedido();

        if(!isset($pedidoinfo) or !$pedidoinfo) {
            header("Location: /");
            exit;
        }

        $pedidoinfo['id'] = $_GET['id'];

        $this->view->info = $pedidoinfo;

        $this->render('ver_pedido','layout1');
    }

    public function edit_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        if(!isset($_GET['id']) or !$_GET['id']) {
            header("Location: /");
            exit;
        }

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_pedido',$_GET['id']);
        $pedido->__set('id_usuario',$_SESSION['id']);
        $pedido->__set('descricao',$_POST['descricao']);
        $pedido->__set('endereco',$_POST['endereco']);
        
        $pedido->edit_pedido();

        $pedidoinfo = $pedido->ver_pedido();
        if(!isset($pedidoinfo) or !$pedidoinfo) {
            header("Location: /");
            exit;
        }
        $pedidoinfo['id'] = $_GET['id'];
        $this->view->info = $pedidoinfo;
        header("Location: /?edit=1");
    }

    public function excluir_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        if(!isset($_GET['id']) or !$_GET['id']) {
            header("Location: /");
            exit;
        }

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_pedido',$_GET['id']);
        $pedido->__set('id_usuario',$_SESSION['id']);
        
        $pedido = $pedido->exc_pedido();

        header("Location: /?exc=1");
    }

    public function enviar_email(){
        $obj = Container::getModel('email','instant_service');

        $obj->__set('assunto','QUEM OLHAR É GAY');
        $obj->__set('corpo','Email enviado automaticamente por <b style="color: yellow;">InstantService</b>');
    }
}

?>
