<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
include("Connection/conn.php");
		$user_name = $_SESSION['user_name'];
		if($user_name==''){
			echo "<script>";
			echo "alert(\" กรุณาเข้าสู่ระบบ \");";
	        echo "window.location.href='login.php'";
	        echo "</script>";
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
            <?php
				if(!empty($_SESSION['cart'])){
			?>
			<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
			  <table width="100%" class="table" border="0">
				<tr>
				  <td>No.</td>
				  <td>&nbsp;</td>
				  <td>รายการ</td>
				  <td>ราคา</td>
				  <td>จำนวน</td>
				  <td>รวม/รายการ</td>
				</tr>
				<?php
				$total = 0;
				foreach($_SESSION['cart']as $p_id=>$p_qty){
					$sql3 ="SELECT * FROM tb_product WHERE p_id=$p_id ";
					$result3 =mysqli_query($con,$sql3);
					while($row3 = mysqli_fetch_array($result3)){
				?>
				<tr>
				  <td><?php echo $i+=1 ; ?></td>
				  <td><img src="../img-products/<?php echo $row3['p_image']; ?>" width="100"  /></td>
				  <td><?php echo $row3['p_name']; ?></td>
				  <td><?php echo number_format($row3['p_price'],2); ?></td>
				  <?php
				  $sum = $p_qty * $row3['p_price'] ;
				  ?>
				  <td><?php echo $p_qty ; ?></td>
			
				  <?php $_SESSION['cart'][$p_id] = $p_qty ; ?>
				  <td><?php echo number_format($sum,2); ?></td>
				</tr>
				<?php
				$total2 += $sum ;
					}
				}
				$total = $total2 + "50";
				?>
				<tr>
				  <td colspan="5" align="right">ราคารวม</td>
				  <td><?php echo number_format($total2,2); ?></td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="5" align="right">ค่าขนส่ง</td>
				  <td><?php echo number_format("50",2); ?></td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="5" align="right">รวมสุทธิ</td>
				  <td><b><u><?php echo number_format($total,2); ?></u></b></td>
				  <td>&nbsp;</td>
				</tr>
			  </table>
			<p>    
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
			<table border="0" class="table" cellspacing="0" align="center">
			<tr>
				<td colspan="2" align="center" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE" align="right">ชื่อ</td>
				<td><input name="name" class="form-control" type="text" id="name" required/></td>
			</tr>
			<tr>
				<td width="35%" align="right" bgcolor="#EEEEEE">ที่อยู่</td>
				<td width="65%">
				<textarea name="address" class="form-control" cols="35" rows="5" id="address" required></textarea>
				</td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE" align="right">อีเมล</td>
				<td><input name="email" class="form-control" type="email" id="email"  required/></td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE" align="right">เบอร์ติดต่อ</td>
				<td><input name="phone" class="form-control" type="text" id="phone" required /></td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE" align="right">อำเภอ</td>
				<td><input name="city" class="form-control" type="text" id="city"  required/></td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE" align="right">จังหวัด</td>
				<td><input name="state" class="form-control" type="text" id="state" required /></td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE" align="right">รหัสไปษณีย์</td>
				<td><input name="postal_code" class="form-control" type="text" id="postal_code"  required/></td>
			</tr>	
			<input type="hidden" name="user_name" id="user_name" value="<?php $_SESSION['user_name']; ?>" />
			<tr>
				<td colspan="2" align="center" bgcolor="#CCCCCC">
				<input type="submit" name="Submit2" value="สั่งซื้อ" />
			</td>
			</tr>
			</table>
            </div>
			</form>
			<?php
				}else{
			?>
			<table width="100%" class="table" border="0">
			  <tr>
				<td>
				<p align="center">ไม่มีสินค้าอยู่ในตะกร้า</p>
				<p></p>
				<p></p>
				<p></p>
				<p align="center"><a href="index.php" class="btn btn-primary btn-sm">กลับไปหน้าแรก</a></p>
				</td>
			  </tr>
			</table>
			<?php
				}
			?>
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