<?php
    date_default_timezone_set('America/Sao_Paulo');
    /*echo date("Y-m-d");

    $stts = (isset($new_habilidades_cad[$values['id']]))?'none':'true';*/

?>
<form action="TESTE2.php"  method="POST" enctype="multipart/form-data">
    <div class="col-12 mt-4">
        <!-- O Nome do elemento input determina o nome da array $_FILES -->
        Adicionar Imagem: <input type="file" name="imgadd" id="a" accept=".pdf" require ><br>    
    </div>

    <input type="hidden" name="adimg" value="ok">

    <button type="submit" class="my-3 m-auto btn btn-success w-50">
        Adicionar
    </button>
</form>