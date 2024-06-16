<?php
namespace App\Models;
use MF\Model\Model;

class Login extends Model{
    private $tb = "login";

    public function login($login = '',$senha = '',$logar = false) {

        if(!isset($_SESSION['id'])) {
            session_start();
        }
        
        if(!$logar) {
            if(isset($_SESSION['login']) && isset($_SESSION['senha'])) {
                $login = $_SESSION['login'];
                $senha = $_SESSION['senha'];
            } else {
                header("Location: /login");
                exit;
            }
        }


        if($this->rows('login',$this->tb,"login = '$login' and senha = '$senha'")) {
            if($logar) {
                $info = $this->select('login,senha,id_usuario',$this->tb,"login = '$login' and senha = '$senha'")[0];
                $_SESSION['login'] = $info['login'];
                $_SESSION['senha'] = $info['senha'];
                $_SESSION['id'] = $info['id_usuario'];
                header("Location: /");
            } 
        } else {
            header("Location:/login?fail=1");
            exit;
        }
    }
}