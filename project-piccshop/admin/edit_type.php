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
  if($_GET['type_id']=='');
  $type_id = mysqli_real_escape_string($con, $_GET['type_id']);
  $sql = "SELECT * FROM tb_type WHERE type_id='$type_id' ";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  ?>
      <form id="form1" name="form1" method="post" action="update_type.php">
        <table width="400" border="1">
          <tr>
            <td colspan="2" align="center">เพิ่มประเภทสินค้า</td>
          </tr>
          <tr>
            <td align="right">ประเภทสินค้า :</td>
            <td><label for="user_pass"></label>
              <input type="text" class="form-control" name="type_name" id="type_name" value="<?php echo $row['type_name'] ;?>" required/></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btn" id="btn" class="btn btn-primary btn-sm" value="บันทึกข้อมูล" /> &nbsp;
              <input type="button" name="cancel" id="cancel" class="btn btn-danger btn-sm" onclick="window.location.href='type.php';" value="กลับ" /></td>
          </tr>
        </table>
        <input type="hidden" name="type_id" value="<?php echo $row['type_id'] ;?>" id="type_id" />
      </form></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>