<?php
// se o botao for clicado
  if (isset($_POST['button_register'])) {

    include_once '../class/user.php';

    $user = new User;
    
    $id_user = $user->create($_POST['fname'], $_POST['lname'], $_POST['birthday'], $_POST['email'], $_POST['psw'], '2' );

    //??
    header('Location: login.php?id='.$id_user[0]['id']);
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

<form action="register.php" method="post"enctype="multipart/form-data">
<div class="container">
    <h1>Register a new account</h1>
      <label for="fname"><b>First Name </b></label><br>
      <input type="text" placeholder="Enter first name" name="fname" required><br>
      <label for="lname"><b>Last Name </b></label><br>
      <input type="text" placeholder="Enter last name" name="lname" required><br>
      <label for="date"><b>Date of Birthday </b></label><br>
      <input type="date" placeholder="Enter birthday" name="birthday" required><br>
      <label for="email"><b>Email </b></label><br>
      <input type="email" placeholder="Enter email" name="email" required><br>
      <label for="psw"><b>Password </b></label><br>
      <input type="password" placeholder="Enter password" name="psw" required><br>
      <label for="psw_repeat"><b>Repeat Password </b></label><br>
      <input type="password" placeholder="Repeat password" name="psw_repeat" required><br><br>
      <button type="submit" name="button_register">Register</button>
    </div>
    </div>
</form>

</body>
</html>