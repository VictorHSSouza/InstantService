<?php
namespace App\Models;

use DateTime;

class Funcoes_gerais{
    public static function difhoraatual($hora) {
        //ver se passou 22 horas des da variavel $hora
        $dataatu = strtotime(date("Y-m-d H:i:s")) - strtotime($hora);
        return (79200<$dataatu)?true:false;
    }

    public static function validasenha($senha) {
        $minLength = 8; // Comprimento mínimo
        $temMaiuscula = preg_match('/[A-Z]/', $senha); // Pelo menos uma letra maiúscula
        $temMinuscula = preg_match('/[a-z]/', $senha); // Pelo menos uma letra minúscula
        $temNumero = preg_match('/\d/', $senha); // Pelo menos um número
        $temEspecial = preg_match('/[\W_]/', $senha); // Pelo menos um caractere especial

        // Validação
        $resp['valida'] = false;

        if (strlen($senha) < $minLength) {
            $resp['msg'] = "A senha deve ter pelo menos $minLength caracteres.";
        }
        elseif (!$temMaiuscula) {
            $resp['msg'] = "A senha deve conter pelo menos uma letra maiúscula.";
        }
        elseif (!$temMinuscula) {
            $resp['msg'] = "A senha deve conter pelo menos uma letra minúscula.";
        }
        elseif (!$temNumero) {
            $resp['msg'] = "A senha deve conter pelo menos um número.";
        }
        elseif (!$temEspecial) {
            $resp['msg'] = "A senha deve conter pelo menos um caractere especial.";
        } else {
            $resp['valida'] = true;
        }
        
        return $resp;
    }
}