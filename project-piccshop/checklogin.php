<?php
session_start(); //เรียกใช้ session
	if($_POST['username']){
		include("Connection/conn.php"); //ดึงฐานข้อมูลมาใช้
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql ="SELECT * FROM tb_user WHERE user_name='".$username."'
		 AND user_pass='".$password."' "; //เรียกฐานข้อมูลมาเทียบค่าที่ใส่ลงไป
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)==1){
			$row = mysqli_fetch_array($result);
			$_SESSION['user_id'] = $row['user_id']; //เทียบค่าเพื่อเก็บ session 
			$_SESSION['user_name'] = $row['user_name']; //เทียบค่าเพื่อเก็บ session
			header("location: index.php"); //เข้าสู่ระบบผ่านไปที่ index.php
		}else{
			echo "<script>";
			echo "alert(\" user หรือ password ไม่ถูกต้อง \");";
			echo "window.history.back()"; //เข้าสู่ระบบไม่ผ่านให้กลับไปหน้าก่อน
			echo "</script>";
		}
		}else{
			header("location: login.php"); //ถ้าไม่ตรงเงื่อนไข ให้ไปหน้า login.php
		}
?>