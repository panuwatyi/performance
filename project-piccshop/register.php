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
          <form id="form1" name="form1" method="post" action="add.php">
            <table class="table" align="center">
              <tr>
                <td colspan="2" align="center">สมัครสมาชิก</td>
              </tr>
              <tr>
                <td>
                <input class="form-control" type="text" name="username" placeholder="Username" required/>
                </td>
                <td>
                <input class="form-control" type="password" name="password" placeholder="Password" required/>
                </td>
              </tr>
              <tr>
                <td>
                <input class="form-control" type="text" name="first_last_name" placeholder="ชื่อ-สกุล" required/>
                </td>
                <td>
                <input class="form-control" type="email" name="email" placeholder="Email" required/>
                </td>
               </tr>
               <tr>
                <td>
                <input class="form-control" type="text" name="phone" placeholder="เบอร์โทรศัพท์" required/>
                </td>
                <td>
                <input class="form-control" type="text" name="address" placeholder="ที่อยู่" required/>
                </td>
               </tr>
               <tr>
                <td>
                <input class="form-control" type="text" name="city" placeholder="อำเภอ" required/>
                </td>
                <td>
                <input class="form-control" type="text" name="state" placeholder="จังหวัด" required/>
                </td>
               </tr>
               <tr>
                <td>
                <input class="form-control" type="text" name="postal_code" placeholder="รหัสไปรษณีย์" required/>
                </td>
               </tr>
              <tr>
                <td align="center" colspan="2">
                  <input type="submit" class="btn btn-success btn-sm" name="btn" value="Register" />
                  <a href="index.php" class="btn btn-danger btn-sm">Back</a>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>

</body>
</html>