<?php session_start(); ?>
<?php include('Connection/conn.php');  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Computer Shop</title>
     <?php include ('include/h.php');?>
     </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
        </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <?php
              $user = mysqli_real_escape_string($con, $_SESSION['user_name']);
              $sql ="SELECT * FROM tb_user WHERE user_name='$user' ";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
            ?>
          <form id="form1" name="form1" method="post" action="update_user.php">
            <table class="table" align="center">
              <tr>
                <td colspan="2" align="center">แก้ไขข้อมูล</td>
              </tr>
              <tr>
                <td>
                <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $row['user_name']; ?>" readonly="readonly" required/>
                </td>
                <td>
                <input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo $row['user_pass']; ?>" required/>
                </td>
              </tr>
              <tr>
                <td>
                <input class="form-control" type="text" name="first_last_name" placeholder="ชื่อ-สกุล"value="<?php echo $row['user_first_last_name']; ?>" required/>
                </td>
                <td>
                <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $row['user_email']; ?>" required/>
                </td>
               </tr>
               <tr>
                <td>
                <input class="form-control" type="text" name="phone" placeholder="เบอร์โทรศัพท์" value="<?php echo $row['user_phone']; ?>" required/>
                </td>
                <td>
                <input class="form-control" type="text" name="address" placeholder="ที่อยู่" value="<?php echo $row['user_address']; ?>" required/>
                </td>
               </tr>
               <tr>
                <td>
                <input class="form-control" type="text" name="city" placeholder="อำเภอ" value="<?php echo $row['user_city']; ?>" required/>
                </td>
                <td>
                <input class="form-control" type="text" name="state" placeholder="จังหวัด" value="<?php echo $row['user_state']; ?>" required/>
                </td>
               </tr>
               <tr>
                <td>
                <input class="form-control" type="text" name="postal_code" placeholder="รหัสไปรษณีย์" value="<?php echo $row['user_postal_code']; ?>" required/>
                </td>
               </tr>
              <tr>
                <td align="center" colspan="2">
                  <input type="submit" class="btn btn-success btn-sm" name="btn" value="แก้ไขข้อมูล" />
                  <a href="index.php" class="btn btn-danger btn-sm">Back</a>
                </td>
              </tr>
            </table>
            <input type="hidden" name="user_id" id="user_id" 
      value="<?php echo $row['user_id']; ?>" />
          </form>
        </div>
      </div>
    </div>

</body>
</html>