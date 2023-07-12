<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
include("Connection/conn.php");
$p_id = $_REQUEST['p_id'];
$act = $_REQUEST['act'];

	if($act=='add' && !empty($p_id)){
		if(isset($_SESSION['cart'][$p_id])){
			$_SESSION['cart'][$p_id]++;
		}else{
			$_SESSION['cart'][$p_id]=1;
		}
	}
	if($act=='remove' && !empty($p_id)){
		unset($_SESSION['cart'][$p_id]);
	}
	if($act=='update'){
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id => $amount){
			$_SESSION['cart'][$p_id] = $amount;
		}
	}

?>
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
    <?php session_start(); ?>
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
            <?php if(!empty($_SESSION['cart'])){ ?>
                <form id="form1" name="form1" method="post" action="?act=update">
                  <table class="table" width="100%" border="0">
                    <tr>
                      <td width="10%">No.</td>
                      <td width="15%">&nbsp;</td>
                      <td width="25%">รายการ</td>
                      <td width="10%">ราคา</td>
                      <td width="10%">จำนวน</td>
                      <td width="15%">รวม/รายการ</td>
                      <td>ลบ</td>
                    </tr>
                    <?php
                    foreach($_SESSION['cart']as $p_id=>$p_qty){
                    $sql ="SELECT * FROM tb_product WHERE p_id=$p_id";
                    $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                      <td><?php echo $i+=1; ?></td>
                      <td><img src="img-products/<?php echo $row['p_image']; ?>" width="100%"  /></td>
                      <td><?php echo $row['p_name']; ?></td>
                      <td><?php echo $row['p_price']; ?></td>
                      <?php
                      if($p_qty > $row['p_qty']){
                          $p_qty = $row['p_qty'];
                      }
                      $sum = $row['p_price'] * $p_qty;
                      $total4 += $sum;
                      ?>
                      <td><?php echo "<input name='amount[$p_id]' value='$p_qty' size='2' >"; ?></td>
                      <?php $_SESSION['cart'][$p_id] = $p_qty; ?>
                      <td><?php echo number_format($sum,2); ?></td>
                      <td><a href="cart.php?p_id=<?php echo $row['p_id']; ?>&act=remove" class="btn btn-danger btn-sm">ลบ</a></td>
                    </tr>
                    <?php } } ?>
                    <tr>
                      <td align="right" colspan="5"><b>รวม :</b></td>
                      <td><?php echo number_format($total4,2); ?></td>
                      <td></td>
                    </tr>
                    <?php
                    $total = $total4 + "50";
                    ?>
                    <tr>
                      <td align="right" colspan="5"><b>ค่าขนส่ง :</b></td>
                      <td><?php echo number_format("50",2); ?></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td align="right" colspan="5"><b>รวมสุทธิ :</b></td>
                      <td><b><u><?php echo number_format($total,2); ?></u></b></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td align="center" colspan="5"><a href="index.php" class="btn btn-danger btn-sm" >กลับไปยังหน้าแรก</a></td>
                      <td colspan="2"><button class="btn btn-success btn-sm" name="btn" type="submit">คำนวนราคาใหม่</button>&nbsp;<a href="confirm.php" class="btn btn-primary btn-sm">สั่งชื้อ</a></td>
                    </tr>
                  </table>
                </form>
                <?php }else{ ?>
                <p align="center">ไม่พบสินค้าในตะกร้า</p>
                <p align="center"></p>
                <p align="center"></p>
                <p align="center"></p>
                <p align="center"><a href="index.php" class="btn btn-primary btn-sm">กลับไปยังหน้าแรก</a></p>
                <?php } ?>
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