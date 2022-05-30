<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>

<!--*******************************************************************************************************************************************************************************************-->
<?php
// autofill dropdown menu
$sql ="SELECT  teacher_id, name FROM teacher";
$result = mysqli_query($con,$sql);

$namelist ='';
while($rest = mysqli_fetch_assoc($result)){
  $namelist.= "<option value=\"{$rest['teacher_id']}\">{$rest['name']}</option>";
}
?>
<!--*******************************************************************************************************************************************************************************************-->




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

<div class="container">
   <h1 style="text-align: center;">Giveing New Permission To Access The System</h1>
   <br><br>
 <div>
   <form action="newpanal.php" method ="POST" >
   <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Select Instructor :</label>
<select class="form-select" name="listteacher" required>
<?php echo $namelist?>
</select> <input type="submit" name="btnsearch" class="btn btn-success me-md-2" value="Search"> 
</div>
   </form>
   <!--Data search and display fuction-->
   <?php
if(isset($_POST['btnsearch'])){

   $searchid = $_POST["listteacher"];
   // search from data base 
   $sql = "SELECT teacher_id, name , email   FROM teacher  WHERE  teacher_id  ='$searchid'";

   $result_set = mysqli_query($con,$sql);
  
   while($row = mysqli_fetch_array($result_set)){
     ?>
     <form action="newpanal.php" method ="POST" >
  <div class="form-group">
  <label>Instructor ID:</label>
  <input type="text" class="form-control" name="ins_id" value ="<?php echo $searchid;?>" readonly>
</div>
<div class="form-group">
  <label>Instructor Name:</label>
  <input type="text" class="form-control" name="ins_name" value ="<?php echo $row['name'];?>" required>
</div>
<div class="form-group">
  <label>Instructor Email Address:</label>
  <input type="email" class="form-control" name="ins_email" value ="<?php echo $row['email'];?>" required>
</div>
<div class="form-group">
  <label>Instructor Password:</label>
  <input type="password" class="form-control" name="ins_password" required>
</div>
<div class="form-group">
  <label>Retype Instructor Password:</label>
  <input type="password" class="form-control" name="rtyins_password" required>
</div>
<br>
<input type="submit" name="btnsubmit" class="btn btn-success me-md-2" value="Submit Data">
<input type="reset"  class="btn btn-primary me-md-2 " value="Reset">

  </form>  
   <?php
   }
} ?>
 </div>
 <!--*******************************************************************************************************************************************************************************************-->
<!--Insert data to table-->
<?php
 if(isset($_POST['btnsubmit'])){

  $insid = $_POST["ins_id"];
  $insname = $_POST["ins_name"];
  $insemail = $_POST["ins_email"];
  $paswword = $_POST["ins_password"];
  $rtypassword = $_POST ["rtyins_password"];
  $role = "instructor";
// check password are matched
  if($paswword == $rtypassword){

    $sql = "INSERT INTO user ( username  , name , role , password ) 
    VALUES ('{$insid}','{$insname}','{$role}','{$paswword}')";

    // chech data is successfully entered
    $resultset = mysqli_query($con,$sql);
    if ($resultset){

      // sending email
        
      $to =$insemail;
      $mail_subject = 'Dolex English Acadmey';
      $email_body = "Message from Admin Of Dolex English Academy";
      $email_body .= "<b>From :</b> Admin Of Dolex Accedmey<br>";
      $email_body .= "<b>Subject :</b>You Have the permissinon to acess dolex learning management system as a instructor<br>";
      $email_body .= "<b>Message :</b> You can Enter the Dolex Learning Management Syatem using this username :{$insid}  and This password :{$paswword}<br>";
    
      $header = "From : Dolex \r\nContent-Type:text/html;";
    
      $send_mail_result = mail($to,$mail_subject,$email_body,$header);

      if( $send_mail_result){
        ?> 
              <script>
                   swal({
                    title: "Email Has been Send",
                    text: " successfull Data Insert And Email has been send",
                    icon: "success",
                    button: "Ok",
                   });
                 </script>
             <?php
      }else{
        ?> 
        <script>
             swal({
              title: "Email Has not been Send",
              text: " Unsuccessfull Email send",
              icon: "error",
              button: "Ok",
             });
           </script>
       <?php
      }
    }else {
      ?> 
      <script>
           swal({
          title: "Data Insert",
          text: " Unsuccessfull Data Insert",
          icon: "error",
          button: "Ok",
           });
         </script>
     <?php   
         
    }
  }else {
    ?> 
      <script>
     alert ("Password You Enter Does Not Match !!!");
   </script>
<?php
  }


 }
?>

 <!--*******************************************************************************************************************************************************************************************-->
  
 </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
<script src="../Js/sweetalert.min.js"></script>
<script src ="../Js/jquery.min.js"></script>
  </body>
</html>
