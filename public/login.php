<?php

    if(isset($_GET['id'])){

        echo'registration completed successfully. Please log in';
    }

    if(isset($_POST['button_login'])){

        include_once '../class/user.php';

    $user = new User;
    
    $login = $user->login($_POST['email'], $_POST['psw'] );

    //se alguem estiver logado ou seja maior que 1
    if($login[0]['id'] > 0){
        //email, id, role e nome e sobrenome dos usuarios serao salvos na sesssao 
        $_SESSION['email'] = $login[0]['email'];
        $_SESSION['id'] = $login[0]['id'];
        $_SESSION['role'] = $login[0]['role'];
        $_SESSION['name'] = $login[0]['first_name'] . ' ' . $login[0]['last_name'];

        //se o usuario for o administrador
        if($login[0]['role'] == '1'){
            //encaminha para o index do adm
            header('Location: adm/index.php');

        }
        else{
              //encaminha para o index do usuario
            header('Location: index.php');
        }
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

<form action="login.php" method="post" enctype="multipart/form-data">
<div class="container">
      <label for="uname"><b>email</b></label><br>
      <input type="text" placeholder="Enter Email" name="email" required><br>
      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="psw" required><br><br>
      <button type="submit" name="button_login">Login</button>
    </div>
</form>

</body>
</html>