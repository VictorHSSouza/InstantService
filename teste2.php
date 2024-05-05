<?PHP 

    var_dump($_FILES);
    //$prod = $woocommerce->get("products/" . $_POST['id'])->images;
    /*if($_FILES['imgadd']['name']) {
        $uploaddir = 'prod_images/';
        $filename = basename($_FILES['imgadd']['name']);
        $arquivo = $uploaddir . $filename;
        //echo $arquivo;
        if (!move_uploaded_file($_FILES['imgadd']['tmp_name'], $arquivo)) {
            echo "erro";
        }
        $images = $prod;
        $images[] = ['src' => LINKIMG . $arquivo];

        $data = [
            'images' => $images
        ];
        $woocommerce->put('products/'.$_POST['id'], $data);
        header ("Location: produto.php?id=".$_POST['id']);
    }*/
