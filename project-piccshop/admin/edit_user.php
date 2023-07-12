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
    <td width="774" align="center" valign="top">
    <?php
	if($_GET['user_id']=='');
	$user_id = mysqli_real_escape_string($con, $_GET['user_id']);
	$sql ="SELECT * FROM tb_user WHERE user_id='$user_id' ";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	?>
    <form id="form1" name="form1" method="post" action="update_user.php">
      <table width="400" border="1">
        <tr>
          <td colspan="2" align="center">แก้ไขข้อมูล</td>
          </tr>
        <tr>
          <td width="161" align="right">Username :</td>
          <td width="223"><input type="text" name="user_name" id="user_name"
          value="<?php echo $row['user_name']; ?>" readonly="readonly" required/></td>
        </tr>
        <tr>
          <td align="right">Password :</td>
          <td><input type="password" name="user_pass" id="user_pass" value="<?php echo $row['user_pass']; ?>" required/></td>
        </tr>
        <tr>
          <td align="right">สถานะ :</td>
          <td><select name="user_role" id="user_role">
         	<option value="<?php echo $row['user_role']; ?>"><?php echo $row['user_role']; ?></option>
            <option value="admin">admin</option>
            <option value="user">user</option>
          </select></td>
        </tr>
        <tr>
          <td align="right">ชื่อ - สกุล :</td>
          <td><input type="text" name="user_first_last_name" id="user_first_last_name" value="<?php echo $row['user_first_last_name']; ?>" required/></td>
        </tr>
        <tr>
          <td align="right">Email :</td>
          <td><input type="email" name="user_email" id="user_email" value="<?php echo $row['user_email']; ?>" required/></td>
        </tr>
        <tr>
          <td align="right">เบอร์โทรศัพท์ :</td>
          <td><input type="text" name="user_phone" id="user_phone" value="<?php echo $row['user_phone']; ?>" required/></td>
        </tr>
        <tr>
          <td align="right">ที่อยู่ :</td>
          <td><input type="text" name="user_address" id="user_address" value="<?php echo $row['user_address']; ?>" required/></td>
        </tr>
        <tr>
          <td align="right">อำเภอ :</td>
          <td><input type="text" name="user_city" id="user_city" value="<?php echo $row['user_city']; ?>" required/></td>
        </tr>
        <tr>
          <td align="right">จังหวัด :</td>
          <td><input type="text" name="user_state" id="user_state" value="<?php echo $row['user_state']; ?>" required/></td>
        </tr>
        <tr>
          <td align="right">รหัสไปษณีย์ :</td>
          <td><input type="text" name="user_postal_code" id="user_postal_code" value="<?php echo $row['user_postal_code']; ?>" required/></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="btn" id="btn" value="บันทึกข้อมูล" /></td>
          </tr>
      </table>
      <input type="hidden" name="user_id" id="user_id" 
      value="<?php echo $row['user_id']; ?>" />
    </form></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>