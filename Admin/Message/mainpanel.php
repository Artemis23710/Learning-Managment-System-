<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
    <script src="../Js/sweetalert.min.js"></script>
     <script src ="../Js/jquery.min.js"></script>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title></title>
  </head>
  <body>
<div class="mainpage">
<div class="sidepanel">
<ul class="sidelist">
<li> <a href="../Dashborad/mainpanel.php"> <img src="../img/dashboard.png" alt="image"> <h2>Dashboard</h2> </a></li>
  <li> <a href="../course/mainpanel.php"> <img src="../img/course.png" alt="image"> <h2>Course</h2> </a></li>
  <li> <a href="../Teacher/mainpanel.php"> <img src="../img/teacher.png" alt="image"> <h2>Teacher</h2> </a></li>
  <li> <a href="../student/mainpanel.php"> <img src="../img/student.png" alt="image"> <h2>Student</h2> </a></li>
  <li> <a href="../regestration/mainpanel.php"> <img src="../img/registration.png" alt="image"> <h2>Registration</h2> </a></li>
  <li> <a href="../payment/mainpanel.php"> <img src="../img/payment.png" alt="image"> <h2>Payments</h2> </a></li>
  <li> <a href="../lms/mainpanel.php"> <img src="../img/learning.png" alt="image"> <h2>L.M.S</h2> </a></li>
  <li> <a href="../Message/mainpanel.php"> <img src="../img/message.png" alt="image"> <h2>Messages</h2> </a></li>
  <li> <a href="../report/mainpanel.php"> <img src="../img/report.png" alt="image"> <h2>Reports</h2> </a></li>
  <li> <a href="../Setting/mainpanel.php"> <img src="../img/setting.png" alt="image"> <h2>Settings</h2> </a></li>
</ul>
<div class="logout">
  <ul class="sidelist">
  <li><a href="../../Login.php"><img src="../img/logout.png" alt="image"><h2>Logout</h2></a></li>
  </ul>
</div>
</div>
<div class="main_content">
      <div class="header">
<img src="../img/newlogo.png" alt="logo">

      </div>
</div>

<div class="detailstable">
<h1>Send Email </h1>

  <div class="container">
  <form action="mainpanel.php" method="POST">
  <div class="form-group">
      <label for="cusid">Send To : </label>
       <input type="Email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
      <label for="cusid">Receiver Name : </label>
       <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
      <label for="cusid">Subject : </label>
       <input type="Text" class="form-control" name="mailsubject" required>
    </div>
    <div class="form-group">
      <label for="cusid">Message : </label>
      <textarea class ="form-control" name="message" cols="20" rows="5" required></textarea>
    </div>  
    <br>
    <input type="submit" name="btnsend" class="btn btn-success" value="Send">
    <input type="reset" name="btnreset" class="btn btn-secondary" value="Reset">
  </form>
</div>
</div>
<!--*********************************************************************************************************************-->
<?php
// checking if the form is submited
if(isset($_POST['btnsend'])){
  $email =$_POST['email'];
  $name =$_POST['name'];
  $subject =$_POST['mailsubject'];
  $message =$_POST['message'];

  $to =$email;
  $mail_subject = 'Dolex English Acadmey';
  $email_body = "Message from Admin Of Dolex English Academy";
  $email_body .= "<b>From :</b> {$name} <br>";
  $email_body .= "<b>Subject :</b> {$subject}<br>";
  $email_body .= "<b>Message :</b><br>". nl2br(strip_tags($message));

  $header = "From : {$email}\r\nContent-Type:text/html;";

  $send_mail_result = mail($to,$mail_subject,$email_body,$header);

  if( $send_mail_result){
    ?> 
    <script>
   alert ("Message has  sent");
 </script>
  <?php

  }else{
    ?> 
    <script>
   alert ("Message has not sent");
 </script>
  <?php
  }
}
?>

</div>
  </body>
</html>
