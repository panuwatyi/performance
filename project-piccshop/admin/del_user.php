<?php
include("../Connection/conn.php");
	$user_id = $_REQUEST['user_id'];
	$sql ="DELETE FROM tb_user WHERE user_id=$user_id ";
	$result = mysqli_query($con, $sql);
	header("location: user.php");
?>