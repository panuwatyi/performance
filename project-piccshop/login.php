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
        <div class="col-xs-4 col-sm-4 col-md-4">
        </div>
          <div class="col-xs-4 col-sm-4 col-md-4">
          <form id="form1" name="form1" method="post" action="checklogin.php">
            <table class="table" align="center">
              <tr>
                <td align="center">Login</td>
              </tr>
              <tr>
                <td ><input class="form-control" type="text" name="username" placeholder="Username" id="username" /></td>
              </tr>
              <tr>
                <td><input class="form-control" type="password" name="password" placeholder="Password" id="password" />
                    <p><a href="register.php">สมัครสมาชิก ?</a></p>
                </td>
                
              </tr>
              <tr>
                <td align="center">
                  <input type="submit" class="btn btn-success btn-sm" name="btn" value="Login" />
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