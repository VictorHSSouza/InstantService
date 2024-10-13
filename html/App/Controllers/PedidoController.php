<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use App\Models\Email;

class PedidoController extends Action {
    public function fazer_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $problema = Container::getModel('problema','instant_service');
        $tipo_problema = $problema->list_tipos();

        $this->view->dados = $tipo_problema;
        $this->render('fazer_pedido','layout1');
    }

    public function list_problemas() {  //ajax não mexer
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
            echo "<option value='".$value['id_problema']."'>".$value['nome']."</option>";
        }
    }

    public function cad_pedido() {
        ob_start();
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        if(!isset($_POST['id_problema']) or !$_POST['id_problema']) {
            var_dump($_POST);
            echo "oi";
            header("Location: /");
            exit;
        }

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_cliente',$_SESSION['id']);
        $pedido->__set('id_problema',$_POST['id_problema']);
        $pedido->__set('descricao',$_POST['descricao']);
        $pedido->__set('endereco',$_POST['endereco']);

        $pedido->cad_pedido();

        $email = new Email;
        $email->__set('dados', $_POST);

        $obj_prof_hablidades = Container::getModel('profissional_habilidades','instant_service');
        $profissionais = $obj_prof_hablidades->list_prof_email($_POST['id_problema']);
        
        //var_dump($profissionais);
        foreach($profissionais as $value) {
            $email->__set('email_destinatario', $value['email']);
            $email->__set('nome_destinatario', $value['nome']);
            $email->email_cad_pedido();
        }
        
        header("Location: /?pedido=1");
    }
///////////////
    public function ver_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        if(!isset($_GET['id']) or !$_GET['id']) {
            header("Location: /");
            exit;
        }

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_pedido',$_GET['id']);
        $pedido->__set('id_cliente',$_SESSION['id']);
        
        $pedidoinfo = $pedido->ver_pedido();

        if(!isset($pedidoinfo) or !$pedidoinfo) {
            header("Location: /");
            exit;
        }

        $obj_msg = Container::getModel('Mensagem','instant_service');
        $obj_msg->__set("id_pedido",$_GET['id']);
        $chat = $obj_msg->view_chat();

        $this->view->chat = $chat;
        $this->view->remetente = "U";

        $pedidoinfo['id'] = $_GET['id'];

        $this->view->info = $pedidoinfo;

        $this->render('ver_pedido','layout1');
    }

    public function ver_pedido_profissional() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        if(!isset($_GET['id']) or !$_GET['id']) {
            header("Location: /");
            exit;
        }

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_pedido',$_GET['id']);
        $pedido->__set('id_cliente',$_SESSION['id']);
        
        $pedidoinfo = $pedido->ver_pedido_profissional();

        if(!isset($pedidoinfo) or !$pedidoinfo) {
            header("Location: /");
            exit;
        }

        $pedidoinfo['id'] = $_GET['id'];

        $this->view->info = $pedidoinfo;

        $this->render('ver_pedido_profissional','layout1');
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
        $pedido->__set('id_cliente',$_SESSION['id']);
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
        $pedido->__set('id_cliente',$_SESSION['id']);
        
        $pedido = $pedido->exc_pedido();

        header("Location: /?exc=1");
    }

    public function vincular_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_pedido',$_GET['id']);
        $pedido->__set('id_profissional',$_SESSION['id']);
        $pedido->__set('data_confirmacao',date("Y-m-d H:i:s"));
        
        $pedido->vincular_pedido();

        header("Location: /profissional");
    }

    public function recusar_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_pedido',$_GET['id']);
        $pedido->__set('id_profissional',$_SESSION['id']);
        
        $pedido->recusar_pedido();

        header("Location: /profissional");
    }

    public function finalizar_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_pedido',$_GET['id']);
        
        $pedido->finalizar_pedido();

        header("Location: /profissional");
    }

    public function detalhes_pedido() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        if(!isset($_GET['id']) or !$_GET['id']) {
            header("Location: /");
            exit;
        }

        $pedido = Container::getModel('pedido','instant_service');

        $pedido->__set('id_pedido',$_GET['id']);
        $pedido->__set('id_cliente',$_SESSION['id']);
        
        $pedidoinfo = $pedido->ver_pedido_profissional();

        if(!isset($pedidoinfo) or !$pedidoinfo) {
            header("Location: /");
            exit;
        }

        $pedidoinfo['id'] = $_GET['id'];

        $this->view->info = $pedidoinfo;
        
        $obj_msg = Container::getModel('Mensagem','instant_service');
        $obj_msg->__set("id_pedido",$_GET['id']);
        $chat = $obj_msg->view_chat();

        $this->view->chat = $chat;
        $this->view->remetente = "P";
        $this->render('detalhes_pedido','layout1');
    }

    public function cad_mensagem() {
        $obj = Container::getModel('login','instant_service');
        $obj->Login();

        var_dump($_GET);
        var_dump($_POST);

        $obj_msg = Container::getModel('Mensagem','instant_service');
        $obj_msg->__set("id_pedido",$_GET['id_pedido']);
        $obj_msg->__set("id_profissional",$_SESSION['id']);
        $obj_msg->__set("remetente",$_GET['remetente']);
        $obj_msg->__set("mensagem",$_POST['msg']);
        $obj_msg->cad_chat();

        header("Location: /".$_GET['link']."?id=".$_GET['id_pedido']);
    }
}


?>
