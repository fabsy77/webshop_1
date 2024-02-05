<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include_once '../class/products.php';


$prod = new Product;

    $list_products = $prod->getAll();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php foreach ($list_products as $prod ) {

                $path = "../image//";         
            ?>
           
                <img src="<?php echo $path . $prod['image'];?>" style="width:200px;"><br>
                Product: <?php echo $prod['name']?><br>
                Description: <?php echo $prod['description']?><br>
                Price:  <?php echo $prod['price']?>

                <form action="addToCart.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $prod['id']?>">
                    <h5>Quantity</h5>
                    <input type="number" name="quantity" min="1">
                    <button type="submit">Add to Card</button>
                </form>
            
            <?php } ?>



    </div>
</body>
</html>