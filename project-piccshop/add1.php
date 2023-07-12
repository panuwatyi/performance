<?php
include("conn.php");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user_first_last_name = $_POST['user_first_last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$postal_code = $_POST['postal_code'];
	$result = mysqli_query($con,"SELECT user_name FROM tb_user WHERE user_name='$username'");
	$num = mysqli_num_rows($result);
	if($num > 0){
		echo "<script>";
		echo "alert(\" Usernameซ้ำ กรุณารองใหม่ \")";
		echo "window.history.back()";
		echo "</script>";
	}else{
		$result1 = mysqli_query($con,"INSERT INTO tb_user VALUES(null,'$username','$password','user','$user_first_last_name','$email','$phone','$address','$city','$state','$postal_code')");
		echo "<script>";
		echo "alert(\" สมัครสมาชิกสำเร็จ \")";
		echo "window.location.href='login.php'";
		echo "</script>";
	}	
		mysqli_close($con);
?>

<?php
session_start();
include("Connection/conn.php");
	$user_name = $_POST['user_name'];
	$user_pass = $_POST['user_pass'];
	$user_role = "user";
	$user_first = $_POST['user_first'];
	$user_email = $_POST['user_email'];
	$user_phone = $_POST['user_phone'];
	$user_address = $_POST['user_address'];
	$user_city = $_POST['user_city'];
	$user_state = $_POST['user_state'];
	$user_postal = $_POST['user_postal'];
	$result = mysqli_query($con,"SELECT user_name FROM tb_user WHERE user_name='$user_name'");
	$num = mysqli_num_rows($result);
	if($num > 0){
		echo "<script>";
		echo "alert(\" user ซ้ำ\");";
		echo "window.history.back()";
		echo "</script>";
	}else{
		$result1 = mysqli_query($con,"INSERT INTO tb_user VALUES(null,'$user_name')");
		echo "<script>";
		echo "alert(\" สำเร็จ\");";
		echo "window.location.href='login.php'";
		echo "</script>";
	}
?>