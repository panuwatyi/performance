<?php session_start(); ?>
<?php include('Connection/conn.php'); ?>
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
          $user_name = $_POST['username'];
          $user_pass = $_POST['password'];
          $user_role = "user";
          $user_first_last_name = $_POST['first_last_name'];
          $user_email = $_POST['email'];
          $user_phone = $_POST['phone'];
          $user_address = $_POST['address'];
          $user_city = $_POST['city'];
          $user_state = $_POST['state'];
          $user_postal_code = $_POST['postal_code'];
          $sql = "INSERT INTO tb_user VALUES ('NULL','$user_name','$user_pass','$user_role','$user_first_last_name','$user_email','$user_phone','$user_address','$user_city','$user_state','$user_postal_code')";
          $result = mysqli_query($con,$sql);
          echo "<script>";
          echo "alert(\" บันทึกข้อมูลเรียบร้อยแล้ว \");";
          echo "window.location.href='login.php'";
          echo "</script>";
      ?>
</body>
</html>