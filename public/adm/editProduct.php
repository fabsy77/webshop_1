<?php

    include_once '../../class/products.php';

    $product = new Product;

    //verifica se tem algo dentro do id
    if(isset($_GET['id'])){
        $productEdit = $product->getById($_GET['id']);
    }

    //se existe algo dentro do botao edit
    if(isset($_POST['edit'])){

        if($product->update($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'], $_FILES['image']['name'])){

            header('Location: index.php');

        }else{
            echo 'error editing product';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="index.php">All Products</a>
    </nav>
            
    <div>
        <form action="editProduct.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $productEdit[0]['id']; ?>">
            <label for="">Product</label><br>
            <input type="text" name="name" value="<?php echo  $productEdit[0]['name']; ?>"require><br>
            <label for="">Description</label><br>
            <input type="text" name="description" value="<?php echo $productEdit[0]['description']; ?>" require><br>
            <label for="">Price</label><br>
            <input type="text" name="price" value="<?php echo $productEdit[0]['price']; ?>"require><br>
            <label for="">Image</label>
            <input type="file" name="image"><br><br>
            <button name="edit" type="submit">Edit a Product</button><br>
        </form>

    </div>
</body>
</html>