<?php
include("../Connection/conn.php");
	$user_id = $_POST['user_id'];
	$user_name = $_POST['user_name'];
	$user_pass = $_POST['user_pass'];
	$user_role = $_POST['user_role'];
	$user_email = $_POST['user_email'];
	$user_phone = $_POST['user_phone'];
	$user_address = $_POST['user_address'];
	$user_city = $_POST['user_city'];
	$user_state = $_POST['user_state'];
	$user_postal_code = $_POST['user_postal_code'];
	
	$sql ="UPDATE tb_user SET user_name='$user_name', user_pass='$user_pass', 
	user_role='$user_role', user_email='$user_email', user_phone='$user_phone',
	user_address='$user_address', user_city='$user_city', user_state='$user_state',
	user_postal_code='$user_postal_code' WHERE user_id=$user_id ";
	$result = mysqli_query($con, $sql);
	header("location: user.php");
?>
