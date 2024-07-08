<?php

    $cep = "31710550";  
    $url = "https://viacep.com.br/ws/{$cep}/json/";

    $address = json_decode(file_get_contents($url));
    var_dump($address);

    //echo $address->logradouro;

    //echo '<br> CASA DO THIAGO (NÃO TEM PISCINA)';
?>