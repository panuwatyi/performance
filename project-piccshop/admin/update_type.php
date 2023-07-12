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
	$type_id = $_POST['type_id'];
	$type_name = $_POST['type_name'];
	$sql = "UPDATE tb_type SET type_name='$type_name' WHERE type_id='$type_id' ";
	$result = mysqli_query($con, $sql);
	echo "<script>";
	echo "window.location.href='type.php' ";
	echo "</script>";
	mysqli_close($con);
?>



	<?php
	$type_id = $_POST['type_id'];
	$type_name = $_POST['type_name'];
	$result = mysqli_query($con,"UPDATE tb_type SET type_name='$type_name' WHERE type_id='$type_id'");
	echo "<script>";
	echo "alert(\" สำเร็จ \");";
	echo "window.location.href='update_type.php'";
	echo "</script>";
	mysqli_close();
	?>
    <?php
	session_start();
	session_destroy();
	header("location: index.php");

	?>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>