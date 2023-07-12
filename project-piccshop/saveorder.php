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
	session_start();
	include('Connection/conn.php');
	error_reporting(error_reporting() & ~E_NOTICE);
	date_default_timezone_set('Asia/Bangkok');
	$order_first_last_name = $_POST['name'];
	$order_address = $_POST['address'];
	$order_city = $_POST['city'];
	$order_postal_code = $_POST['postal_code'];
	$order_phone = $_POST['phone'];
	$order_email = $_POST['email'];
	$order_state = $_POST['state'];
	$user_name = $_SESSION['user_name'];
	$date = date('Y-m-d H:i:s');
	$p_qty = $_POST['p_qty'];
	$total = $_POST['total'];
	
	mysqli_query($con, "BEGIN");
	$sql1 = "INSERT INTO tb_order VALUES(NULL,'$user_name','$order_first_last_name','$order_email','$order_phone','$order_address','$order_city','$order_state','$order_postal_code','$date')";
	$query1 = mysqli_query($con, $sql1);
	
	$sql2 = "SELECT MAX(order_id) as order_id FROM tb_order where order_phone = '$order_phone'";
	$query2 = mysqli_query($con, $sql2);
	$row = mysqli_fetch_array($query2);
	$order_id = $row['order_id'];
	
	foreach($_SESSION['cart'] as $p_id=>$p_qty){
		$sql3 = "SELECT * FROM tb_product WHERE p_id=$p_id";
		$query3 = mysqli_query($con, $sql3);
		$row3 = mysqli_fetch_array($query3);
		$total = $row3['p_price'] * $p_qty;
		$outstock = "UPdate tb_product SET p_qty=p_qty-".$p_qty." where p_id=".$p_id." Limit 1";
		$result = mysqli_query($con, $outstock);
		
		$sql4 = "INSERT tb_order_detail VALUES(NULL,'$user_name','$order_id','$p_id','$p_qty','$total')";
		$query4 = mysqli_query($con, $sql4);
	}
	if($query1 && $query4){
		mysqli_query($con, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
	}else{
		mysqli_query($con, "ROLLBACK");
		$msg = "ไม่สามารถบันทึกข้อมูลได้ค่ะ กรุณาติดต่อเจ้าหน้าที่ค่ะ";
	}
	?>
	<script type="text/javascript">
	alert('<?php echo $msg; ?>');
	window.location = "index.php";
	</script>
</body>
</html>