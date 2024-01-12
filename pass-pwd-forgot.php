<!--Server side code to handle passenger sign up-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['Pwd_reset']))
		{
			#$pass_fname=$_POST['pass_fname'];
			#$mname=$_POST['mname'];
			#$pass_lname=$_POST['pass_lname'];
			#$pass_phone=$_POST['pass_phone'];
			#$pass_addr=$_POST['pass_addr'];
			#$pass_uname=$_POST['pass_uname'];
			$email=$_POST['email'];
			$status='Pending';
            //sql to insert captured values
			$query="insert into preset (email, status) values(?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ss', $email, $status);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Check Your Email For Password Reset Instructions";
			}
			else {
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
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
    <style>
      .form-control::placeholder {
  color: #f7a8f1;
}
    </style>
  </head>
  <body class="be-splash-screen" style="background-color: #edc5eb;">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container forgot-password">
            <div class="card" style=" box-shadow: 10px 10px 18px rgba(191, 27, 175, 0.9);background-color:#7a075c;width:350px; ">
              <div class="card-header"><img class="logo-img" src="" alt="" width="102" height="#{conf.logoHeight}"><span class="splash-description" style="color:#f7a8f1;">Forgot your password?</span></div>
              <div class="card-body">
              <?php if(isset($success)) {?>
            <!--This code for injecting an alert-->
                    <script>
                                setTimeout(function () 
                                { 
                                    swal("Success!","<?php echo $success;?>!","success");
                                },
                                    100);
                    </script>
    
            <?php } ?>
            <?php if(isset($err)) {?>
            <!--This code for injecting an alert-->
                    <script>
                                setTimeout(function () 
                                { 
                                    swal("Failed!","<?php echo $err;?>!","Failed");
                                },
                                    100);
                    </script>
    
            <?php } ?>
              <!--Password Reset Form-->
                <form method ="POST" >
                  <p style="color:#f7a8f1;">Don't worry, we'll send you an email to reset your password.</p>
                  <div class="form-group pt-4">
                    <input style=" border: none;background-color:#7a075c;  border-bottom: 2px solid #f7a8f1;  outline: none;  padding: 5px 0;" class="form-control" type="email" id="email" name="email" required="" placeholder="Your Email" autocomplete="off"><img style="width:30px;height:30px;position:absolute;top:220px;right:35px;" src="./assets/images/mail.png" alt="">
                  </div>
                  <!-- <p class="pt-1 pb-4" style="color:#f7a8f1;">Don't remember your email? <a href="#" >Contact Support</a>.</p> -->
                  <div class="form-group pt-1"><input type ="submit" id="reset" name ="Pwd_reset" class="btn btn-block btn-primary btn-xl" style="border:none;color:#7a075c;background-color:#f7a8f1" value = "Reset Password"></div>
                </form>
                <!--End Password Reset-->
              </div>
            </div>
            <div class="splash-footer"><a href = "index.php">Home</a></div>
            <div class="splash-footer">&copy; 2022 - <?php echo date ('Y');?> VASHU Railway Reservation System </div>
        </div>
      </div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/js/swal.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      });
      
    </script>
     <script src="https://smtpjs.com/v3/smtp.js">
</script>
<script>
    var btn=document.getElementById('reset');
    btn.addEventListener('click',function(e){
        e.preventDefault();

        // var name=document.getElementById('name1').value;
        var email=document.getElementById('email').value;
        
        // var message=document.getElementById('message').value;
        var body=' your password is:- train';
        Email.send({
    SecureToken : "865b9dd7-d033-42e7-82fa-fb2505230b1b",
    To : email,
    From : 'alphahike134@gmail.com',
    Subject : 'give information about the ticket',
    Body : body
}).then(
  function (message) {
        // If the email is sent successfully
        alert("Password recovery success");
        window.location.href = 'pass-login.php';
    }
);

    })


  
 
</script>
  </body>

</html>