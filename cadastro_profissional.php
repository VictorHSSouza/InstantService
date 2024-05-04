<?php

require('teste_login.inc.php');
$bd = new BD();
if($bd->selectLinhas('*', 'cadastro_profissional', 'id_usuario = ' . $_SESSION['id_usuario']) == 1 && $bd->selectLinhas('*', 'cadastro_profissional', 'status_cadastro = 0 and id_usuario = ' . $_SESSION['id_usuario']) == 1) {
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

                    <div>
                        <label>Adicione o seu currículo em pdf: </label>
                        <input class="mt-2" type="file" name="imgadd" id="a" accept=".pdf" require>
                    </div>
                
                    <div class="my-3 mx-auto p-0 text-center cad2">
                        <button type="submit" class="w-75 btn btn-success">Enviar</button>
                    </div>

                </form>
            </div>
            <script src="assets/js/all.js"> </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </body>
    </html>
    <?php
}
elseif(isset($_POST['cep'])) {
    $bd = new BD();

    $indice = 'id_usuario';
    $valor = $_SESSION['id_usuario'];

    foreach($_POST as $key => $value) {
        $indice =  $indice.", $key";
        $valor = ($key == 'id_estado')?$valor.", $value":$valor.", '$value'";
    }

    $indice = $indice.", status_ativo, status_cadastro";
    $valor = $valor.", 0, 0";

    $bd->insert('cadastro_profissional',$indice,$valor);

    Header("Location: home.php?cad_prof=1");
} else {
    
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
                        <label class="col mb-2 p-0 my-auto text-start" for="id_estado">
                            Estado:
                        </label>

                        <select class="col-12 p-1" name="id_estado" id="id_estado">
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

                    <div class="my-3 mx-auto p-0 text-center cad2">
                        <button type="submit" class="w-75 btn btn-success">Cadastrar</button>
                    </div>

                </form>
            </div>
            <script src="assets/js/all.js"> </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </body>
    </html>
    <?php
}