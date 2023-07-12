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
    <td valign="top" width="234"><?php require_once("navbar.php"); ?></td>
    <td align="center" valign="top">
    <a href="add_product.php" class="btn btn-primary btn-sm">เพิ่มข้อมูล</a>
    <table width="100%" border="1">
  <tr>
    <td>รหัสสินค้า</td>
    <td>ประเภทสินค้า</td>
    <td>ชื่อสินค้า</td>
    <td>Option</td>
  </tr>
  <?php
  $sql="SELECT * FROM tb_product ORDER BY p_id asc";
  $result =mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result)){
  ?>
  <tr>
    <td><?php echo $row['p_id']; ?></td>
    <td><?php echo $row['type_name']; ?></td>
    <td><?php echo $row['p_name']; ?></td>
    <td>
    <a href="edit_product.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-sm">แก้ไข</a>
    <a href="del_product.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-danger btn-sm">ลบ</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>