<?php 

namespace App\Models;
use MF\Model\Model;

class Login extends Model{
    protected $tb = "LOGIN";

    public function login() {  
        
        $status = $this->rows('login', $this->tb,"login ='".$_POST['login']. "' and senha = '".md5($_POST['senha'])."'");

        if($status == 1) {
        }
    }
}