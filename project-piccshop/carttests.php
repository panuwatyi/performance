<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
include("Connections/conn.php");
$p_id = $_REQUEST['p_id'];
$act = $_REQUEST['act'];

	if($act=='add' && !empty($p_id)){
		if(isset($_SESSION['cart'][$p_id])){
			$_SESSION['cart'][$p_id]++;
		}else{
			$_SESSION['cart'][$p_id]=1;
		}
	}
	if($act=='remove' && !empty($p_id)){
		unset($_SESSION['cart'][$p_id]);
	}
	if($act=='update'){
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount){
			$_SESSION['cart'][$p_id] = $amount;
		}
	}

include("include/h.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php include("include/navbar.php"); ?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include("include/navleft.php"); ?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<?php if(!empty($_SESSION['cart'])){ ?>
				
			<?php } ?>
		</div>
	</div>
</div>