<?php
namespace App\Models;

class Correio{
    public static function list_endereco($cep) {
        $url = "https://viacep.com.br/ws/$cep/json/";

        return file_get_contents($url);
    }
}