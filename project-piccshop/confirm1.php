<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
include("Connection/conn.php");
$p_id = $_REQUEST['p_id'];
$act = $_REQUEST['act'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php include("include/h.php"); ?>
</head>

<body>

<div class="container">
	<div class="row">
    	<div class="col-md-12">
        	<?php include("include/navbar.php"); ?>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
    	<div class="col-md-3">
        	<?php include("include/leftnav.php"); ?>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
    	<div class="col-md-9">
        	<?php if(!empty($_SESSION['cart'])){ ?>
           	  <table width="100%" border="0">
                  <tr>
                    <td>NO.</td>
                    <td>&nbsp;</td>
                    <td>รายการ</td>
                    <td>ราคา</td>
                    <td>จำนวน</td>
                    <td>รวม/รายการ</td>
                  </tr>
                  <?php
				  	foreach($_SESSION['cart'] as $p_id=>$p_qty){
						$result3 = mysqli_query($con,"SELECT * FROM tb_product WHERE p_id=$p_id ");
						while($row3 = mysqli_fetch_array($result3)){
				  ?>
                  <tr>
                    <td><?php echo $i+=1; ?></td>
                    <td><img src="img-products/<?php echo $row3['p_image']; ?>" width="100%"  /></td>
                    <td><?php echo $row3['p_name']; ?></td>
                    <td><?php echo $row3['p_price']; ?></td>
                    <?php
						if($p_qty > $row3['p_qty']){
							$p_qty = $row3['p_qty'];
						}
						$sum = $p_qty * $row3['p_price'];
						$total += $sum;
					?>
                    <td><?php echo $p_qty; ?></td>
                    <?php $_SESSION['cart'][$p_id] = $p_qty; ?>
                    <td><?php echo number_format($sum,2); ?></td>
                  </tr>
                  <?php } } ?>
                  <tr>
                    <td align="right" colspan="5">รวม</td>
                    <td><?php echo number_format($total,2); ?></td>
                    <td>&nbsp;</td>
                  </tr>
                  <?php $vat = $total*0.07; ?>
                  <tr>
                    <td align="right" colspan="5">ภาษี</td>
                    <td><?php echo number_format($vat,2); ?></td>
                    <td>&nbsp;</td>
                  </tr>
                  <?php $total2 = $total + $vat; ?>
                  <tr>
                    <td align="right" colspan="5">รวมสุทธิ์</td>
                    <td><?php echo number_format($total2,2); ?></td>
                    <td>&nbsp;</td>
                  </tr>
                  <?php }else{ ?>
                  <p></p>
                  <p></p>
                  <p></p>
                  <p></p>
                  <p></p>
                  <p align="center"><a href="index.php" class="btn btn-primary btn-sm">กลับไปหน้าแรก</a></p>
                 <?php } ?>
                </table>
        </div>
    </div>
</div>

</body>
</html>