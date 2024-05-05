<?php
    require "conexao.inc.php";
    $bd = new BD();
    date_default_timezone_set('America/Sao_Paulo');
    
    if($_GET['cad_habilidade']== 1) {
        if($_GET['status_habilidade']== 0) {
            $indice = 'id_profissional,id_habilidade,data';
            $valor = $_GET['id_profissional'].",".$_GET['id_habilidade'].",'".date("Y-m-d")."'";
            $bd->insert('profissional_habilidades',$indice,$valor);

        } elseif($_GET['status_habilidade']== 1) {
            $bd->delete('profissional_habilidades','id_profissional = '.$_GET['id_profissional'].' and id_habilidade = '.$_GET['id_habilidade']);
        }           
    }