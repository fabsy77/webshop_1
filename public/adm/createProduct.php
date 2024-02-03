<?php

    include_once '../../class/products.php';

    //verifica se algo foi enviado dentro do botao create do submit
    if(isset($_POST['create'])){
        //instancia da classe produto
        $product = new Product;

        if($product->create($_POST['product'], $_POST['description'], $_POST['price'], $_FILES['image']['name']  )){
            echo 'Product created';

        }else{
            echo'error when creating the product';
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document-----</title>
</head>
<body>
    <nav>
        <a href="index.php">All Products</a>
    </nav>
            
    <div>
        <form action="createProduct.php" method="post" enctype="multipart/form-data">
            <label for="">Product</label><br>
            <input type="text" name="product" require><br>
            <label for="">Description</label><br>
            <input type="text" name="description" require><br>
            <label for="">Price</label><br>
            <input type="text" name="price" require><br>
            <label for="">Image</label><br>
            <input type="file" name="image"><br><br>
            <button name="create" type="submit">Create a new Product</button>
        </form>

    </div>
</body>
</html>