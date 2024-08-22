<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use App\Models\GoogleClient;

class LoginController extends Action {

    public $authUrl;

    public function Login() {
        /*
        $googleClient = new GoogleClient;
        $googleClient->init();
        $googleClient->authorized();
        $this->authUrl = $googleClient->generateAuthLink();
        */

        if(isset($_GET['fail'])) $this->view->dados = ['erro' => 1];
        $this->render('login','layout2');
    }

    public function Logar() {
        /*$obj = Container::getModel('login','instant_service');
        $obj->Login($_POST['login'],md5($_POST['senha']),true);
        header("Location: /");*/

        $obj = Container::getModel('login','instant_service');
        /*
        $googleClient = new GoogleClient;
        $googleClient->init();
        $googleClient->authorized(); */


        if($_POST) {
            $obj->login($_POST['login'],md5($_POST['senha']),"",true);
        } /* elseif($googleClient->getData()) {
            $email = $googleClient->getEmail();
            $obj->login("","",$email,$logar = true);
        } */else {
            header("Location: /login");
        }
    } 

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /?msg=logout");
    } 
}

?>
