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
	<?php
	$user_name = $_POST['user_name'];
	$user_pass = $_POST['user_pass'];
	$user_role = $_POST['user_role'];
	$user_first_last_name = $_POST['user_first_last_name'];
	$user_email = $_POST['user_email'];
	$user_phone = $_POST['user_phone'];
	$user_address = $_POST['user_address'];
	$user_city = $_POST['user_city'];
	$user_state = $_POST['user_state'];
	$user_postal_code = $_POST['user_postal_code'];
	$sql = "INSERT INTO tb_user VALUES('NULL','$user_name','$user_pass','$user_role','$user_first_last_name','$user_email','$user_phone','$user_address','$user_city','$user_state','$user_postal_code')";
	$result = mysqli_query($con, $sql);
	mysqli_close($con);
	echo "<script>";
	echo "window.location.href='user.php'";
	echo "</script>";
?>
</body>
</html>