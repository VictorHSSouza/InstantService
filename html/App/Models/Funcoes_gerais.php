<?php
namespace App\Models;

use DateTime;

class Funcoes_gerais{
    public static function difhoraatual($hora) {
        //ver se passou 22 horas des da variavel $hora
        $dataatu = strtotime(date("Y-m-d H:i:s")) - strtotime($hora);
        return (79200<$dataatu)?true:false;
    }
}