<?php

include '../class/user.php';

$user = new User;

$usuarios = $user->getAll();

echo '<pre>';

print_r($usuarios);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>