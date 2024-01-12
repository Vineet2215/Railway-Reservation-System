<!-- Server side code for log in-->
<?php
session_start();
include('assets/inc/config.php'); //get configuration file
if (isset($_POST['emp_login'])) {
  $admin_email = $_POST['admin_email'];
  $admin_pwd = sha1(md5($_POST['admin_pwd'])); //double encrypt to increase security
  $stmt = $mysqli->prepare("SELECT admin_email ,admin_pwd , admin_id FROM admin WHERE admin_email=? and admin_pwd=? "); //sql to log in user
  $stmt->bind_param('ss', $admin_email, $admin_pwd); //bind fetched parameters
  $stmt->execute(); //execute bind
  $stmt->bind_result($admin_email, $admin_pwd, $admin_id); //bind result
  $rs = $stmt->fetch();
  $_SESSION['admin_id'] = $admin_id; //assaign session to admin id
  //$uip=$_SERVER['REMOTE_ADDR'];
  //$ldate=date('d/m/Y h:i:s', time());
  if ($rs) { //if its sucessfull
    header("location:emp-dashboard.php");
  } else {
    #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
    $error = "Access Denied Please Check Your Credentials";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <title>VASHU Railway Reservation System</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
  <!--Trigger Sweet Alert-->
  <?php if (isset($error)) { ?>
    <!--This code for injecting an alert-->
    <script>
      setTimeout(function() {
          swal("Failed!", "<?php echo $error; ?>!", "error");
        },
        100);
    </script>

  <?php } ?>
  <style>
    .form-control::placeholder {
  color: #f7a8f1;
}
  </style>
</head>

<body class="be-splash-screen"  style="background-color: #edc5eb">
  <div class="be-wrapper be-login">
    <div class="be-content">
      <div class="main-content container-fluid">
        <div class="splash-container">
          <div class="card"style=" box-shadow: 10px 10px 18px rgba(191, 27, 175, 0.9);background-color:#7a075c;width:350px; ">
            <div class="card-header">
              <span style="color:#f7a8f1;"> Admin Login <span class="splash-description" style="color:#f7a8f1;">Please enter your admin information.</span>
            </div>
            <div class="card-body">

              <!--Login Form-->
              <form method="POST">
                <div class="login-form ">

                  <div class="form-group">
                    <input  style=" border: none;background-color:#7a075c;  border-bottom: 2px solid #f7a8f1;  outline: none;  padding: 5px 0;" class="form-control" required name="admin_email" type="text" placeholder="Email" autocomplete="off"><img style="width:30px;height:30px;position:absolute;top:158px;right:35px;" src="../assets/images/mail.png" alt="">
                  </div>

                  <div class="form-group">
                    <input  style=" border: none;background-color:#7a075c;  border-bottom: 2px solid #f7a8f1;  outline: none;  padding: 5px 0;"class="form-control" required name="admin_pwd" type="password" placeholder="Password"><img style="width:30px;height:30px;position:absolute;right:35px;top:225px;" src="../assets/images/padlock.png" alt="">
                  </div>

                  <div class="form-group row login-tools">
                    <div class="col-6 login-forgot-password"><a style="color:#f7a8f1;" href="../pass-pwd-forgot.php">Forgot Password?</a></div>
                  </div>

                  <div class="form-group row login-submit">
                    <div class="col-6"><input style="border:none;color:#7a075c;background-color:#f7a8f1" type="submit" name="emp_login" class="btn btn-primary btn-xl" value="Log In"></div>
                  </div>

                </div>
              </form>
              <!--End Login-->


            </div>
          </div>
          <div class="splash-footer"><a href="../index.php">Home</a></div>
          <div class="splash-footer">&copy; 2022 - <?php echo date('Y'); ?> VASHU Railway Reservation System </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
  <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="assets/js/app.js" type="text/javascript"></script>
  <script src="assets/js/swal.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      //-initialize the javascript
      App.init();
    });
  </script>
</body>

</html>