<?php
session_start();
include("../Connection/conn.php");
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['user_name'];
	$user_role = $_SESSION['user_role'];
	if($user_role!='admin'){
		header("location: logout.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" />
<link href="../js/bootstrap.min.js" rel="stylesheet" />
</head>

<body>
<table width="1024" border="1" align="center">
  <tr>
    <td colspan="2"><h1>Admin Area</h1></td>
  </tr>
  <tr>
    <td width="234"><?php require_once("navbar.php"); ?></td>
    <?php
	include("picc.php");
	$p_id = $_POST['p_id'];
	$type_name = $_POST['type_name'];
	$p_name = $_POST['p_name'];
	$p_detail = $_POST['p_detail'];
	$p_price = $_POST['p_price'];
	$p_qty = $_POST['p_qty'];
	$p_image = picc($_FILES['p_image']);
	if($_FILES['p_image']['name']!=""){
	$sql = "UPDATE tb_product SET type_name='$type_name', p_name='$p_name', p_detail='$p_detail', p_price='$p_price', p_qty='$p_qty', p_image='$p_image' WHERE p_id='$p_id' ";
	}else{
	$sql = "UPDATE tb_product SET type_name='$type_name', p_name='$p_name', p_detail='$p_detail', p_price='$p_price', p_qty='$p_qty' WHERE p_id='$p_id' ";
	}
	$result = mysqli_query($con, $sql);
	echo "<script>";
	echo "window.location.href='product.php' ";
	echo "</script>";
	mysqli_close($con);
?>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>