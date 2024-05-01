<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body class="bg-light">
        <div class="m-0 p-0 text-center my-5">

        <h1 class="mb-5">Cadastro de Usuário</h1>

        <form action="insert.php" method="post" class="row container w-25 m-auto p-0 h5 border px-3 border-5 rounded-3 border-dark">

            <div class="mt-3 mb-3 col-12 mx-auto row p-0">
                <label for="Nome" class="col mb-2 p-0 my-auto text-start">Nome:</label>
                <input type="text" id="Nome" name="Nome" class="col-12 p-1 border border-dark" required>
            </div>

            <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                <label for="Sobrenome" class="col mb-2 p-0 my-auto text-start">Sobrenome:</label>
                <input type="text" id="Sobrenome" name="Sobrenome" class="col-12 p-1 border border-dark" required>
            </div>

            <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                <label for="Email" class="col mb-2 p-0 my-auto text-start">Email:</label>
                <input type="email" id="Email" name="Email" class="col-12 p-1 border border-dark" required>
                    
                
            </div>

            <div class="mt-2 mb-3 col-12 mx-auto row p-0">
                <label for="Sexo" class="col mb-2 p-0 my-auto text-start">Sexo:</label>
                <select name="Sexo" id="Sexo" class="col-12 p-1 border border-dark">
                    <option value="F" class="">Feminino</option>
                    <option value="M" class="">Masculino</option>
                    <option value="O" class="">Outro</option>
                </select>
            </div>

            <div class="mt-5 mx-auto p-0 row">
                <div class="text-center col-12 mt-2">
                    <button type="submit" class="w-75 btn btn-success">Cadastrar</button>
                </div>
            </div>
        
        </form>


        
        
        
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>