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
      <form id="form1" name="form1" method="post" action="insert_user.php">
        <table width="400" border="1">
          <tr>
            <td colspan="2" align="center">เพิ่มสมาชิก</td>
          </tr>
          <tr>
            <td width="172" align="right">Username :</td>
            <td width="212"><label for="user_name"></label>
              <input type="text" name="user_name" id="user_name" required/></td>
          </tr>
          <tr>
            <td align="right">Password :</td>
            <td><label for="user_pass"></label>
              <input type="password" name="user_pass" id="user_pass" required/></td>
          </tr>
          <tr>
            <td align="right">สถานะ :</td>
            <td><label for="user_role"></label>
              <select name="user_role" id="user_role" required>
                <option value="admin">admin</option>
                <option value="user">user</option>
              </select></td>
          </tr>
          <tr>
            <td align="right">ชื่อ - สกุล :</td>
            <td><label for="user_first_last_name"></label>
              <input type="text" name="user_first_last_name" id="user_first_last_name" required/></td>
          </tr>
          <tr>
            <td align="right">Email :</td>
            <td><label for="user_email"></label>
              <input type="text" name="user_email" id="user_email" required/></td>
          </tr>
          <tr>
            <td align="right">เบอร์โทรศัพท์ :</td>
            <td><label for="user_phone"></label>
              <input type="text" name="user_phone" id="user_phone" required/></td>
          </tr>
          <tr>
            <td align="right">ที่อยู่ :</td>
            <td><label for="user_address"></label>
              <input type="text" name="user_address" id="user_address" required/></td>
          </tr>
          <tr>
            <td align="right">อำเภอ :</td>
            <td><label for="user_city"></label>
              <input type="text" name="user_city" id="user_city" required/></td>
          </tr>
          <tr>
            <td align="right">จังหวัด :</td>
            <td><label for="user_state"></label>
              <input type="text" name="user_state" id="user_state" required/></td>
          </tr>
          <tr>
            <td align="right">รหัสไปษณีย์ :</td>
            <td><label for="user_postal_code"></label>
              <input type="text" name="user_postal_code" id="user_postal_code" required/></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btn" id="btn" class="btn btn-primary btn-sm" value="บันทึกข้อมูล" /> &nbsp;
              <input type="button" name="cancel" id="cancel" class="btn btn-danger btn-sm" onclick="window.location.href='user.php';" value="กลับ" /></td>
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