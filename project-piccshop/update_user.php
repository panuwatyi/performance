<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Computer Shop</title>
     <?php include ('include/h.php');?>
  </head>
  <body>
    <?php
      include("Connection/conn.php");
        $user_id = $_POST['user_id'];
        $user_pass = $_POST['password'];
        $user_email = $_POST['email'];
        $user_phone = $_POST['phone'];
        $user_address = $_POST['address'];
        $user_city = $_POST['city'];
        $user_state = $_POST['state'];
        $user_postal_code = $_POST['postal_code'];
        
        $sql ="UPDATE tb_user SET user_pass='$user_pass', user_email='$user_email', user_phone='$user_phone',
        user_address='$user_address', user_city='$user_city', user_state='$user_state',
        user_postal_code='$user_postal_code' WHERE user_id=$user_id ";
        $result = mysqli_query($con, $sql);
        echo "<script>";
        echo "window.location.href='index.php'";
        echo "</script>";
        ?>
</body>
</html>