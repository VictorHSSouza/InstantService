<?php
require "conexao.inc.php";

session_start();

if(IsSet($_SESSION["login"]))
	$login = $_SESSION["login"];
if(IsSet($_SESSION["senha"]))
    $senha = $_SESSION["senha"];
if(!(empty($login) OR empty($senha)))
{
    $bd = new BD();

    if($bd->selectLinhas('login','login',"login ='".$login."' and senha = '".$senha."'") == 1)
	{
          
	}
	else
	{
		$_SESSION = array();
		session_destroy();
		echo "Preencha os dados de login corretamente teste2!";
		echo "<a href=index.php>Voltar</a></center>";
    	exit;
	}
}
else
{
	echo "Preencha os dados de login corretamente teste3!";
	echo "<a href=index.php>Voltar</a></center>";
	exit;
}
?>