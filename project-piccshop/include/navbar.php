<img src="image/header.jpg" width="100%"  />
<?php $q =(isset($_GET['q']) ? $_GET['q']:''); ?>
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
	<a class="navbar-brand" href="index.php">
    Brand</a>
</div>
	<ul class="nav navbar-nav">
    	<li><a href="cart.php">ตะกร้าสินค้า</a></li>
    </ul>
    <div class="navbar-right">
        <?php
            include("Connection/conn.php");
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $user_name = $_SESSION['user_name'];
                $sql2 ="SELECT tb_user FROM user_id=$user_id ";
                $result2 = mysqli_query($con, $sql2); 
        ?>
        <ul class="nav navbar-nav">
            <li><a href="profile.php"><?php echo $user_name; ?></a></li>
            <li><a href="logout.php">ออกจากระบบ</a></li>
        </ul>
        
        <?php }else{ ?>

        <ul class="nav navbar-nav">
            <li><a href="login.php">เข้าสู่ระบบ</a></li>
            <li><a href="register.php">สมัครสมาชิก</a></li>
        </ul>
        <?php } ?>



    




    </div>
</div>
</nav>
&nbsp;