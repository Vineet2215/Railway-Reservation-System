<!--Server side code to handle passenger sign up-->
<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['pass_register'])) {
  $pass_fname = $_POST['pass_fname'];
  #$mname=$_POST['mname'];
  $pass_lname = $_POST['pass_lname'];
  $pass_phone = $_POST['pass_phone'];
  $pass_addr = $_POST['pass_addr'];
  $pass_uname = $_POST['pass_uname'];
  $pass_email = $_POST['pass_email'];
  $pass_pwd = sha1(md5($_POST['pass_pwd']));
  //sql to insert captured values
  $query = "insert into user (user_fname, user_lname, user_phone, user_addr, user_uname, user_email, user_pwd) values(?,?,?,?,?,?,?)";
  $stmt = $mysqli->prepare($query);
  $rc = $stmt->bind_param('sssssss', $pass_fname, $pass_lname, $pass_phone, $pass_addr, $pass_uname, $pass_email, $pass_pwd);
  $stmt->execute();
  /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
  //declare a varible which will be passed to alert function
  if ($stmt) {
    $success = "Created Account Proceed To Log In";
  } else {
    $err = "Please Try Again Or Try Later";
  }
}
?>
<!--End Server Side-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <title>VASHU</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />

  <style>
    .register {
      width: 480px;
      height: 620px;
      background-color: #fff;
      margin-top: 3%;
      margin-left: 33%;
      bottom: 30px;
      box-sizing: border-box;
      border-top: 5px solid #4285f4;
      padding: 10px 35px;
      margin-bottom: 30px;
    }

    h1 {
      text-align: center;
      font-size: 24px;
      font-weight: 800;
    }

    input {
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
      border: 1px solid grey;
      height: 40px;
      font-size: 16px;
      padding-left: 25px;
      width: 100%;
    }

    input[type="submit"] {
      border: none;
      height: 40px;
      color: white;
      background: #4285f4;
      font-size: 18px;
      width: 100%;
    }

    input[type="submit"]:hover {
      cursor: pointer;
      background: #4285f4;
      color: #000;
    }

   input::placeholder {
  color: #f7a8f1;
}
  </style>
</head>

<body class="be-splash-screen" style="background-color:  #edc5eb;">
  <div class="be-wrapper be-login">
    <div class="be-content">
      <div class="main-content container-fluid">
        <div class="splash-container">
          <div class="card" style=" box-shadow: 10px 10px 18px rgba(191, 27, 175, 0.9);background-color:#7a075c;width:400px; ">
            <div class="card-header"><span style="color:#f7a8f1;"> Create Account<span class="splash-description" style="color:#f7a8f1;">Please enter your user information.</span></div>
            <div class="card-body">

              <?php if (isset($success)) { ?>
                <!--This code for injecting an alert-->
                <script>
                  setTimeout(function() {
                      swal("Success!", "<?php echo $success; ?>!", "success")
                      .then(function() {
            window.location.href = 'pass-login.php';
        })
        .catch(function(error) {
            console.error("Error:", error);
        });
                     
                    },
                    100);
                </script>

              <?php } ?>
              <?php if (isset($err)) { ?>
                <!--This code for injecting an alert-->
                <script>
                  setTimeout(function() {
                      swal("Failed!", "<?php echo $err; ?>!", "Failed");
                    },
                    100);
                </script>

              <?php } ?>

              <!--Login Form-->
              <form method="POST">
                <input  style=" border: none;background-color:#7a075c;  border-bottom: 2px solid #f7a8f1;  outline: none;  padding: 5px 0;" type="text" name="pass_fname" placeholder="First Name" required> <br>
                <input  style=" border: none;background-color:#7a075c;  border-bottom: 2px solid #f7a8f1;  outline: none;  padding: 5px 0;" type="text" name="pass_lname" placeholder="Last Name" required> <br>
                <input  style=" border: none;background-color:#7a075c;  border-bottom: 2px solid #f7a8f1;  outline: none;  padding: 5px 0;" type="text" name="pass_phone" placeholder="Phone Number" required> <br>
                <input  style="  border: none;background-color:#7a075c;  border-bottom: 2px solid #f7a8f1;  outline: none;  padding: 5px 0;" type="text" name="pass_addr" placeholder="Address" required> <br>
                <input   style="  border: none;background-color:#7a075c;  border-bottom: 2px solid #f7a8f1;  outline: none;  padding: 5px 0;"type="text" name="pass_uname" placeholder="Username" required> <br>
                <input  style="  border: none;background-color:#7a075c;  border-bottom: 2px solid #f7a8f1;  outline: none;  padding: 5px 0;" type="email" name="pass_email" placeholder="Email" required> <br>
                <input   style="  border: none;background-color:#7a075c;  border-bottom: 2px solid #f7a8f1;  outline: none;  padding: 5px 0;"type="password" name="pass_pwd" placeholder="Password" required> <br>

                <input type="checkbox"> <label style="color:#f7a8f1;">I agree with terms and conditions</label> <br>

                <div class="form-group row login-submit">
                  <div class="col-6"><a class="btn btn-secondary btn-xl" style="border:none;color:#7a075c;background-color:#f7a8f1" href="pass-login.php">Login</a></div>
                  <div class="col-6"><input type="submit"style="border:none;color:#7a075c;background-color:#f7a8f1" name="pass_register" class="btn btn-primary btn-xl" value="Register"></div>
                </div>
              </form>
              <!--End Login-->
            </div>
          </div>
          <div class="splash-footer"><a href="index.php">Home</a></div>
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
      
      App.init();
    });
  </script>
</body>

</html>