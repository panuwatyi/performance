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
      	<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <?php include('include/navbar.php'); ?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
          <div class="col-xs-3 col-sm-3 col-md-3">
            <?php include('include/navleft.php'); ?>
          </div>
          <div class="col-xs-9 col-sm-9 col-md-9">
            <?php
              $p_id = mysqli_real_escape_string($con, $_GET['p_id']);
              $sql = "SELECT * FROM tb_product WHERE p_id='$p_id'";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
            ?>
            <div class="col-xs-8 col-sm-8 col-md-8">
              <img src="img-products/<?php echo $row['p_image']; ?>" width="100%"  />
              <p align="center"><a href="index.php" class="btn btn-danger btn-sm">Back</a></p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
              <p><?php echo $row['p_detail']; ?><br /><?php echo $row['p_name']; ?><br />ราคา : <b><?php echo $row['p_price']; ?></b> บาท<br /><a href="cart.php?p_id=<?php echo $row['p_id']; ?>&act=add" class="btn btn-success btn-sm" >สั่งชื้อ</a>

          </div>
        </div>
      </div>


      <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <img src="image/header.jpg" width="100%" height="150" />
        </div>
      </div>
    </div>

</body>
</html>