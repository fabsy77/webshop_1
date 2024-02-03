<?php

    include_once('../class/products.php');
    $prod = new Product;

    $list_prod = $prod->getAll();
/* include '../class/user.php';

$user = new User;

$usuarios = $user->getAll();

echo '<pre>';

print_r($usuarios);
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($list_prod as $prod){

        $path = "../image/"; ?>

        <img src="<?php echo $path.$prod['image'];?>" style="width:200px;"><br>
        Product Name: <?php echo $prod['name'];?>    
        Description: <?php echo $prod['description'];?>
        Price:  <?php echo $prod['price'];?>
   
    <?php }?>
    
</body>
</html>