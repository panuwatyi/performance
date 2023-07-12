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
    <td width="774" align="center" valign="top">
  <a href="add_type.php" class="btn btn-primary btn-sm">เพิ่มข้อมูล</a>
    <?php
  $sql = "SELECT * FROM tb_type ORDER BY type_id asc ";
  $result = mysqli_query($con, $sql);
  ?>
    <table width="100%" border="1">
      <tr>
        <td align="center" width="15%">รหัสประเภท</td>
        <td align="center" width="">ประเภทสินค้า</td>
        <td align="center" width="15%">Options</td>
      </tr>
    <?php
  while($row = mysqli_fetch_array($result)){
  ?>
      <tr>
        <td align="center"><?php echo $row['type_id']; ?></td>
        <td><?php echo $row['type_name']; ?></td>
        <td align="center"><?php echo 
        "<a href='edit_type.php?type_id=$row[0]' class='btn btn-success btn-sm'>แก้ไข</a>
        <a href='del_type.php?type_id=$row[0]' class='btn btn-danger btn-sm'>ลบ</a>"
        ?>
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