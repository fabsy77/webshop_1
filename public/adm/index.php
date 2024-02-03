<?php
    include_once '../../class/products.php';

    $product = new Product;

    $products = $product->getAll();

    //pq a funcao count ?
    $countProduct = count($products); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td{border: 1px solid}
    </style>
</head>
<body>
    <nav>
        <a href="createProduct.php">Add a new Product</a>
    </nav>
    <table >
        <!-- cabelha da tabela -->
        <thead >
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th colspan="3" >Actions</th>
        </thead>
         <!-- corpo da tabela -->
         <tbody>
            <?php foreach ($products as $prod) {?>
                <!-- cada tr é uma linha --> 
                <tr>
                    <td><?php echo $prod['name'];?></td>
                    <td><?php echo $prod['description'];?></td>
                    <td><?php echo $prod['price'];?></td>
                    <td><a href="editProduct.php?id=<?php echo $prod['id']; ?>">Edit</a></td>
                    <td><a href="deleteProduct.php?id=<?php echo $prod['id']; ?>">Remove</a></td>
                </tr>
            <?php }?>
         </tbody>
    </table>
</body>
</html>