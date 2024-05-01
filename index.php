<?php
include('conexao.inc.php');

if($_POST) {
    $bd = new BD();

    if($bd->selectLinhas('login','login',"login ='".$_POST['login']. "' and senha = '".md5($_POST['senha'])."'") == 1) {
      Header("Location: home.php");
    } else {
      ?>
        <div class="alert alert-danger text-center">
          Login Ou Senha Invalidos
        </div>
      <?php
    }
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

  </head>
  <body>
    
    <div><a href="cadastrar.php" class="btn btn-warning">CADASTRAR</a></div>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="row container w-25 m-auto p-0 h5 border px-3 border-5 rounded-3 border-dark">  
        <div class="mt-3 mb-3 col-12 mx-auto row p-0">
            <label for="login" class="col mb-2 p-0 my-auto text-start">Login:</label>
            <input type="text" id="login" name="login" class="col-12 p-1" required> 
        </div>

        <div class="mt-2 mb-3 col-12 mx-auto row p-0">
            <label for="senha" class="col mb-2 p-0 my-auto text-start">Senha:</label>
            <input type="password" id="senha" name="senha" class="col-12 p-1" required> 
        </div>
        
        <div class="my-3 mx-auto p-0 text-center" id="troca_cad">
            <button type="submit" class="w-75 btn btn-success">Logar</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>