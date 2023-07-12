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
    <?php
  if($_GET['p_id']=='');
  $p_id = mysqli_real_escape_string($con, $_GET['p_id']);
  $sql1 = "SELECT * FROM tb_product WHERE p_id='$p_id' ";
  $result1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_array($result1);
   
  ?>
      <form action="update_product.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="600" border="1">
          <tr>
            <td colspan="2" align="center">เพิ่มสินค้า</td>
            </tr>
          <tr>
            <td width="227" align="right">ประเภทสินค้า :</td>
            <td width="357">
            <?php
      $sql = "SELECT * FROM tb_type ORDER BY type_id asc ";
      $result = mysqli_query($con, $sql);
      ?>
              <select name="type_name" class="form-control" id="type_name" required>
              <option value="<?php echo $row1['type_name']; ?>"><?php echo $row1['type_name']; ?></option>
              <?php
        while($row = mysqli_fetch_array($result)){
        ?>
                <option value="<?php echo $row['type_name']; ?>"><?php echo $row['type_name']; ?></option>
                <?php
        }
        ?>
              </select>
              </td>
          </tr>
          <tr>
            <td align="right">ชื่อสินค้า :</td>
            <td><label for="p_name"></label>
              <input type="text" class="form-control" name="p_name" value="<?php echo $row1['p_name']; ?>" id="p_name" required/></td>
          </tr>
          <tr>
            <td align="right">รายละเอียด :</td>
            <td><label for="p_detail"></label>
              <input type="text" class="form-control" name="p_detail" value="<?php echo $row1['p_detail']; ?>" id="p_detail" required/></td>
          </tr>
          <tr>
            <td align="right">ราคา :</td>
            <td><label for="p_price"></label>
              <input type="text" class="form-control" name="p_price" value="<?php echo $row1['p_price']; ?>" id="p_price" required/></td>
          </tr>
          <tr>
            <td align="right">จำนวน :</td>
            <td><label for="p_qty"></label>
              <input type="text" class="form-control" name="p_qty" value="<?php echo $row1['p_qty']; ?>" id="p_qty" required/></td>
          </tr>
          <tr>
            <td align="right">รูปสินค้า :</td>
            <td><label for="p_image"></label>
              <input type="file" class="form-control" name="p_image" id="p_image" /><?php echo $row1['p_image']; ?></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" class="btn btn-primary btn-sm" name="btn" id="btn" value="บันทึกข้อมูล" /> &nbsp;
              <input type="button" class="btn btn-danger btn-sm" onclick="window.location.href='product.php';" name="cancel" id="cancel" value="กลับ" />
              </td>
            </tr>
        </table>
        <input type="hidden" name="p_id" value="<?php echo $row1['p_id']; ?>" id="p_id" />
      </form></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>