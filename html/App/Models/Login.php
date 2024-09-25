<?php
namespace App\Models;
use MF\Model\Model;

class Login extends Model{
    private $tb = "cliente";

    public function login($login = '',$senha = '',$email = '',$logar = false) {

        if(!isset($_SESSION['id'])) session_start();

        if(!$logar) {
            if(isset($_SESSION['login']) && isset($_SESSION['senha'])) {
                $email = $_SESSION['email'];
            } else { 
                header("Location: /login");
                exit;
            }
        }

        $conta = false;
        if($this->rows('login',$this->tb,"login = '$login' and senha = '$senha' or email = '$email'")) {
            $conta = true; 
        }
        

        if($conta) {
            if($logar) {
                $info = $this->select('login, senha, id_cliente, nome, email, tipo, img_perfil',$this->tb,"login = '$login' and senha = '$senha' or email = '$email'")[0];
                $_SESSION['id'] = $info['id_cliente'];
                $_SESSION['nome'] = $info['nome'];
                $_SESSION['login'] = $info['login'];
                $_SESSION['senha'] = $info['senha'];
                $_SESSION['email'] = $info['email'];
                $_SESSION['tipo'] = $info['tipo'];
                $_SESSION['img'] = $info['img_perfil'];

                header("Location: /");
            } 
            //saida logado
        } else {
            header("Location:/login?fail=1");
            exit;
        }
        
    }
}