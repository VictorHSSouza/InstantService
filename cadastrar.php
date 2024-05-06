<?php
include('conexao.inc.php');

if($_POST) {
    $bd = new BD();

    foreach($_POST as $key => $value) {
        if($key == 'nome') {
            $indice = $key;
            $valor = "'$value'";
        } elseif($key == 'login') {
            break;
        } else {
            $indice = $indice.", $key";
            $valor = $valor.", '$value'";
        }
    }
    $bd->insert('cadastro_usuario',$indice,$valor);

    if(md5($_POST['senha']) == md5($_POST['senha2'])) {
        $indice = "tipo,login,senha,id_usuario";
        $valor = "'U','".$_POST['login']."','".md5($_POST['senha'])."', ". $bd->ultimoId();
        $bd->insert('login',$indice,$valor);
    }
    Header("Location: index.php");
} 
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
    
    </head>
    <body class="bg-light">
        <div class="m-0 p-0 text-center my-5 row">
            <h1 class="mb-5">Cadastro de Usuário</h1>

            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="row container col col-sm-4 col-11 m-auto py-2 h5 border px-5 border-5 rounded-3 border-dark">
                <div id="cad1" class="p-0">
                    <div class="mt-3 mb-3 col-12 mx-auto row p-0">
                        <label for="nome" class="col mb-2 p-0 my-auto text-start">Nome:</label>
                        <input type="text" id="nome" name="nome" class="col-12 p-1" required>
                    </div>

                    <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                        <label for="sobrenome" class="col mb-2 p-0 my-auto text-start">Sobrenome:</label>
                        <input type="text" id="sobrenome" name="sobrenome" class="col-12 p-1" required>
                    </div>

                    <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                        <label for="email" class="col mb-2 p-0 my-auto text-start">Email:</label>
                        <input type="email" id="email" name="email" class="col-12 p-1" required> 
                    </div>

                    <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                        <label for="sexo" class="col mb-2 p-0 my-auto text-start">Sexo:</label>
                        <select name="sexo" id="sexo" class="col-12 p-1">
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                            <option value="O">Outro</option>
                        </select>
                    </div>

                    <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                        <label for="cpf" class="col mb-2 p-0 my-auto text-start">CPF:</label>
                        <input type="text" id="cpf" name="cpf" class="col-12 p-1" oninput="mascara_cpf()" onkeypress="return somente_numeros(event)" required> 
                    </div>

                    <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                        <label for="data_nascimento" class="col mb-2 p-0 my-auto text-start">Data de Nascimento:</label>
                        <input type="date" id="data_nascimento" name="data_nascimento" class="col-12 p-1" required> 
                    </div>
                </div>

                <div id="cad2" style="display: none;">
                    <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                        <label for="login" class="col mb-2 p-0 my-auto text-start">Login:</label>
                        <input type="text" id="login" name="login" class="col-12 p-1" required> 
                    </div>

                    <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                        <label for="senha" class="col mb-2 p-0 my-auto text-start">Senha:</label>
                        <input type="password" id="senha" name="senha" class="col-12 p-1" required> 
                    </div>

                    <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                        <label for="senha2" class="col mb-2 p-0 my-auto text-start">Senha Novamente:</label>
                        <input type="password" id="senha2" name="senha2" class="col-12 p-1" required> 
                    </div>
                </div>

                <div class="my-3 mx-auto p-0 text-center" id="troca_cad">
                    <div onclick="troca_cad()" class="w-75 btn btn-success">Próximo</div>
                </div>

                <div class="my-3 mx-auto p-0 text-center" id="submit" style="display: none;">
                    <div class="btn btn-success" onclick="voltar_cad()"><</div>
                    <button type="submit" class="w-75 btn btn-success">Cadastrar</button>
                </div>   

                <div class="mb-4">
                    <a href="index.php" class="text-decoration-none">Já possui uma conta? Entrar.</a>
                </div>

            </form>
        </div>
        <script src="assets/js/all.js"> </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>