<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['admin_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Feedback</title>
  <style>
    
    .box1 {
      border: 2px solid black;
      border-radius: 10px;
      text-align: left;
      width: 300px;
      height: 40px;
      margin-left: 40px;
      padding-left:30px;
    }

    .box2 {
      border: 2px solid black;
      border-radius: 10px;
      text-align: left;
      width: 550px;
      height: 80px;
      margin-left: 20px;
      text-align:center;
      align-items:center;
      display:flex;
      padding-left:30px;
  
    }
    .body{

    padding: 0;
    margin: 0;
  
   
}

    .entry {
      display: flex;
      margin: 15px;
      align-items: center;
    }

    .parent {
      text-align: left;
      position:relative;
     
      /* border-radius: 10px; */
      width: 800px;
      height: 350px;
top:-70px;
      /* padding: 20px; */
      /* padding-left:50px; */
   

    }

    /* .container1 {
      display: flex;

      width: 170px;
      height: 20px;


    } */

    /* Left segment style */
    .left-segment {
      flex: 1;
      /* padding: 20px;  */
      background-color: #e0e0e0;
      width: 50px;
      height: 20px;
    }

    /* Right segment style */
    .right-segment {
      flex: 1;
      /* padding: 20px;  */
      background-color: #f0f0f0;
      width: 100px;
      height: 20px;


    }
    .whole{
      width: 700px;
      height: 80px;
      margin-top:400px;
    
      
    }
    .ab{
      /* display:flex; */
      /* justify-content:center; */
   
  
      /* padding:50px; */
      /* gap:10px; */
      margin-top:400px;
   
     
      width:1100px;
    }
    .imager{
      width:400px;
      height:800px;
      background-color:red;
      border-top-left-radius: 100px;
  border-bottom-left-radius: 100px;
    }
    .p1{
      z-index:200;
      position:absolute;
      top:-200px;
      left:100px
    }
    .p2{
      z-index:200;
      position:absolute;
      top:-174px;
      left:100px
    }
    .p3{
      z-index:200;
      position:absolute;
      top:-146px;
      left:100px
    }
    .p4{
      z-index:200;
      position:absolute;
      top:-121px;
      left:100px
    }
    .beta{
      display:flex;
      justify-content:center;
    
    }
    hr {
    border-style: dotted;
    border-width: 1.5px;
    width:800px;
    color:#750122;
    
}

  </style>
</head>

<body style="background-color:#facd9d; padding: 0;margin: 0;" >
   
  <!--Navigation Bar-->
  <?php include('assets/inc/navbar.php'); ?>
  <div class="beta">
  <img src="../assets/images/update_profile.png" alt="Image"  width="70" height="70">
  <center>
  <h1>Feedbacks:</h1></center>
  </div>
 <hr>
  <?php 
  $aid = $_SESSION['pass_id'];
  $ret = "select * from feedback";
  $stmt = $mysqli->prepare($ret);
  $stmt->execute(); //ok
  $res = $stmt->get_result();
  ?>


  
<?php
  while ($row = $res->fetch_object()) 
  { ?>
  
 <center>
<div class="whole" >
  <div class="parent">
  <img src='../assets/images/fedd1.png' style=" width:700px;border-radius:30px;
      height:350px;top:-290px;position:absolute;" >
      <p class="p1"><b> User id : </b><?php echo $row->user_id ?></p>
      <p class="p2"><b> Date : </b>  <?php echo $row->date ?></p>
      <p class="p3"><b> Time : </b> <?php echo $row->time ?></p>
      <p class="p4"><b> Issue : </b><?php echo $row->feedback ?></p>
    
    <!-- <div class="entry">
      <div>
        <p>User id:</p>
      </div>
      <div class="box1">
       
      </div>
    </div> -->
    <!-- <div class="entry">
      <div class="container1">
        <div class="left-segment">
          Date
        </div>
        <div class="right-segment">
          <?php echo $row->date ?>
        </div>
      </div>
      <div class="container1">
        <div class="left-segment">
          Time

        </div>
        <div class="right-segment">
          <?php echo $row->time ?>
        </div>
      </div>
    
    </div>
    <div class="entry">
      <div>
        <p>Feedback:</p>
      </div>
      <div class="box2"> <?php echo $row->feedback ?></div>
    </div> -->
  </div>
  </div>
  </center>
  
  <?php } ?>
 
</body>

</html>