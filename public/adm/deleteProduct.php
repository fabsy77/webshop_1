<?php
    include_once '../../class/products.php';

$product = new Product;

if(isset($_GET['id'])){

    if($product->delete($_GET['id'])){

        header('location: index.php');
    }

}

?>