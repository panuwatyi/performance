<?php
session_start();
include("conn.php");
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_name = $_SESSION['user_name'];
		$result5 = mysqli_query($con,"SELECT tb_user FROM user_id=$user_id");
?>
<p align="right">ยินดีต้อนรับ : 
<a href="profile.php"><?php echo $user_name ; ?></a> |
<a href="logout.php">ออกจากระบบ</a><br></p>
<?php }else{ ?>
<p align="right">
<a href="login.php">เข้าสู่ระบบ</a> |
<a href="register.php">สมัครสมาชิก</a><br></p>
<?php } ?>
<img src="image/header.jpg" width="100%" />
<?php $q=(isset($_GET['q']) ? $_GET['q']:''); ?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
    	<div class="navbar-header">
        	<a href="index.php" class="navbar-brand">Brand</a>
        </div>
        <ul class="nav navbar-nav">
        	<li><a href="cart.php">ตะกร้าสินค้า</a></li>
            <li><a href="pay.php">แจ้งชำระเงิน</a></li>
        </ul>
        <div class="navbar-right">
        	<form class="navbar-form navbar-left" method="get" action="search.php">
            	<div class="form-group">
                	<input name="q" class="form-control" placeholder="ค้นหา" />
                </div>
                	<button type="submit" name="btn" class="btn btn-primary">ค้นหา</button>
            </form>
        </div>
    </div>
</nav>
&nbsp;

<?php
session_start();
include("Connection/conn.php");
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
	if(isset($_SESSION['user_id'])){
		$result5 = mysqli_query($con,"SELECT tb_user FROM user_id=$user_id");
?>
<p align="right">Hello : 
<a href="profile.php"><?php echo $_SESSION['user_name']; ?></a>
<a href="logout.php">Log out</a>
</p>
<?php }else{ ?>
<p align="right">
<a href="login.php">Sign in</a>
<a href="register.php">Sign up</a>
</p>
<?php } ?>
<img src="image/header.jpg" width="100%" />
<?php $q=(isset($_GET['q']) ? $_GET['q']:''); ?>
	<nav class="navbar navbar-default">
    	<div class="container">
        	<div class="navbar-header">
            	<a href="index.php" class="navbar-brand">Logo</a>
            </div>
            <ul>
            	<li><a href="cart.php">cart</a></li>
            </ul>
            <div class="navbar-right">
            	<form class="navbar-form navbar-left" action="form1" method="get" action="search.php">
                	<div class="navbar-group">
                    	<input name="q" class="form-control" required/>
                        <button type="submit" name="btn" class="btn btn-primary btn-sm">search</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
&nbsp;








