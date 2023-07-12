<?php
session_start();
	if($_POST['username']){
		include("../Connection/conn.php");
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql ="SELECT * FROM tb_user WHERE user_name='".$username."'
		AND user_pass='".$password."' ";
		$result = mysqli_query($con,$sql);
		
		if(mysqli_num_rows($result)==1){
			$row = mysqli_fetch_array($result);
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['user_role'] = $row['user_role'];
			
			if($_SESSION['user_role']=='admin'){
				header("location: index.php");
			}
			if($_SESSION['user_role']=='user'){
				header("location: login.php");
			}
		}else{
			echo "<script>";
			echo "alert(\" user หรือ password ไม่ถูกต้อง \");";
			echo "window.history.back()";
			echo "</script>";
		}
	}else{
		header("location: index.php");
	}
		
?>