<?php

require('teste_login.inc.php');

if($_POST) {
    $bd = new BD();

    $bd->insert('cadastro_profissional',$indice,$valor);

    $indice = "tipo,login,senha,id_usuario";
    $valor = "'U','".$_POST['login']."','".md5($_POST['senha'])."', ". $bd->ultimoId();
    $bd->insert('login',$indice,$valor);

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
        <div class="m-0 p-0 text-center my-5">
            <h1 class="mb-5">Cadastro de Profissional</h1>

            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="row container w-40 m-auto py-2 h5 border px-5 border-5 rounded-3 border-dark">
                
                <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                    <label for="cep" class="col mb-2 p-0 my-auto text-start">CEP:</label>
                    <input type="text" id="cep" name="cep" class="col-12 p-1" oninput="mascara_cep()" onkeypress="return somente_numeros(event)" required> 
                </div>

                <div class="mt-3 mb-3 col-12 mx-auto row p-0">
                    <label for="logradouro" class="col mb-2 p-0 my-auto text-start">Logradouro:</label>
                    <input type="text" id="logradouro" name="logradouro" class="col-12 p-1" required>
                </div>

                <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                    <label for="numero" class="col mb-2 p-0 my-auto text-start">Numero:</label>
                    <input type="number" id="numero" name="numero" class="col-12 p-1" onkeypress="return somente_numeros(event)" required>
                </div>

                <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                    <label for="complemento" class="col mb-2 p-0 my-auto text-start">Complemento:</label>
                    <input type="complemento" id="complemento" name="complemento" class="col-12 p-1" required> 
                </div>

                <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                    <label for="bairro" class="col mb-2 p-0 my-auto text-start">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" class="col-12 p-1" required> 
                </div>

                <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                    <label for="cidade" class="col mb-2 p-0 my-auto text-start">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" class="col-12 p-1" required> 
                </div>

                <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                    <label class="col mb-2 p-0 my-auto text-start" for="estado">
                        Estado:
                    </label>

                    <select class="col-12 p-1" name="estado" id="estado">
                        <?php
                        $bd = new BD();
                        foreach ($bd->select("*","estados") as $value) {
                            ?> 
                            <option value="<?=$value['id_estado']?>"><?=$value['nome_estado']?></option>                             
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="mt-4 mb-1 col-12 mx-auto p-0">
                    <input type="file" name="imgadd" id="imgadd" class="h6" accept=".pdf" require >
                </div>

                <div class="my-3 mx-auto p-0 text-center">
                    <div onclick="troca_cad()" class="w-75 btn btn-success">Próximo</div>
                </div>

                <div class="my-3 mx-auto p-0 text-center cad2">
                    <div class="btn btn-success" onclick="voltar_cad()"><</div>
                    <button type="submit" class="w-75 btn btn-success">Cadastrar</button>
                </div>

            </form>
        </div>
        <script src="assets/js/all.js"> </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>