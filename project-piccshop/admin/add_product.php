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
    <td align="center" valign="top">
      <form action="insert_product.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="400" border="1">
        <tr>
          <td colspan="2" align="center">เพิ่มข้อมูล</td>
          </tr>
        <tr>
          <td width="162" align="right">ประเภทสินค้า :</td>
          <td width="222">
          <?php
      $sql ="SELECT * FROM tb_type ORDER BY type_id asc";
      $result = mysqli_query($con,$sql);
      ?>
          <select name="type_name" id="type_name">
          <?php
      while($row = mysqli_fetch_array($result)){
      ?>
          <option value="<?php echo $row['type_name']; ?>">
      <?php echo $row['type_name']; ?></option>
          <?php
      }
      ?>
          </select>
          </td>
        </tr>
        <tr>
          <td align="right">ชื่อสินค้า :</td>
          <td><input type="text" name="p_name" id="p_name" /></td>
        </tr>
        <tr>
          <td align="right">รายละเอียดสินค้า :</td>
          <td><input type="text" name="p_detail" id="p_detail" /></td>
        </tr>
        <tr>
          <td align="right">ราคา :</td>
          <td><input type="text" name="p_price" id="p_price" /></td>
        </tr>
        <tr>
          <td align="right">จำนวน :</td>
          <td><input type="text" name="p_qty" id="p_qty" /></td>
        </tr>
        <tr>
          <td align="right">รูปสินค้า :</td>
          <td><input type="file" name="p_image" id="p_image" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="btn" id="btn" class="btn btn-primary btn-sm" value="บันทึกข้อมูล" /> &nbsp;
              <input type="button" name="cancel" id="cancel" class="btn btn-danger btn-sm" onclick="window.location.href='product.php';" value="กลับ" /></td>
          </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>