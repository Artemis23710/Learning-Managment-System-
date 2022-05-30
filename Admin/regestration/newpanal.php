<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>
<!--*******************************************************************************************************************************************************************************************-->
<?php
// auto number generate (student id)
$querry ="SELECT  std_id FROM student order by std_id desc";
$ret = mysqli_query($con,$querry);
$rw = mysqli_fetch_array($ret);
$laststdid = $rw['std_id'];
if (empty($laststdid)) {
  $number = "DSI-001";
}
else {
  $idd = str_replace("DSI-","",$laststdid);
  $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
  $number = 'DSI-' .$id;
}
?>
<!--*******************************************************************************************************************************************************************************************-->
<?php
// autofill dropdown menu
$sql ="SELECT  cuname,course_id FROM course";
$result = mysqli_query($con,$sql);

$namelist ='';
while($rest = mysqli_fetch_assoc($result)){
  $namelist.= "<option value=\"{$rest['course_id']}\">{$rest['cuname']}</option>";
}
?>
<!--*******************************************************************************************************************************************************************************************-->


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
    <!--*******************************************************************************************************************************************************************************************-->
    <script>
     // display get selected iteam from dropdown menu and display it in text box
     $(function(){
       $("#courseid").change(function(){
         var displaycourse=$("#courseid option:selected").text();
         $("#coursename").val(displaycourse);
       })
     })
   </script>
   <!--*******************************************************************************************************************************************************************************************-->
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
<!--*******************************************************************************************************************************************************************************************-->
  <!--insert dable data to form-->
  <div class = "container">
<h1 style="text-align: center;">Register New Students</h1>
<?php
  // get request id from table 
  if(isset($_GET['$rqid'])){
  $reid =$_GET['$rqid'];
   
          $sql ="SELECT * FROM reg_request WHERE req_id ='$reid '";
          $result_set = mysqli_query($con,$sql);
          if($result_set)
          while($row = mysqli_fetch_array($result_set)){
    ?>
    <form action="newpanal.php" method ="POST">
<div class="form-group">
  <label for="req-id">Registration Request ID:</label>
  <input type="text" class="form-control" name="reg_req_id" value ="<?php echo $row['req_id'];?>" readonly>
</div>
<div class="form-group">
  <label >Student Registration ID:</label>
  <input type="text" class="form-control" name="std_id" value="<?php echo $number; ?>"  required readonly>
</div>
<div class="form-group">
  <label>Student Full Name:</label>
  <input type="text" class="form-control" name="std_name" value ="<?php echo $row['name'];?>" required>
</div>
<div class="form-group">
  <label>Student Birthday:</label>
  <input type="date" class="form-control" name="std_birthday" value ="<?php echo $row['birthday'];?>"required>
</div>
<div class="form-group">
  <label>Student Address:</label>
  <input type="text" class="form-control" name="std_address" value ="<?php echo $row['address'];?>"required>
</div>
<div class="form-group">
  <label>Student Gender:</label>
  <input type="text" class="form-control" name="std_gender" value ="<?php echo $row['gender'];?>"required>
</div>
<div class="form-group">
  <label>Student Email Address:</label>
  <input type="text" class="form-control" name="std_email" value ="<?php echo $row['email'];?>" required>
</div>
<div class="form-group">
  <label>Student Contact Number:</label>
  <input type="text" class="form-control" name="std_contact" value ="<?php echo $row['contact'];?>" required>
</div>
<div class="form-group">
  <label>Student School:</label>
  <input type="text" class="form-control" name="std_school" value ="<?php echo $row['school'];?>" required>
</div>
<div class="form-group">
  <label>Course:</label>
  <input type="text" class="form-control" name="std_course" value ="<?php echo $row['course'];?>" required>
</div>
<div class="form-group">
  <label>Course ID:</label>
  <input type="text" class="form-control" name="std_courseid" value ="<?php echo $row['course_id'];?>"  readonly required>
</div>
<div class="form-group">
  <label>Batch:</label>
  <input type="text" class="form-control" name="std_batch" >
</div>
<div class="form-group">
  <label>Parent Name:</label>
  <input type="text" class="form-control" name="prt_name" value ="<?php echo $row['prt_name'];?>" required>
</div>
<div class="form-group">
  <label>Parent Contact Number:</label>
  <input type="text" class="form-control" name="prt_contact" value ="<?php echo $row['prt_contact'];?>" required>
</div>
<div class="form-group">
  <label>Student Password:</label>
  <input type="password" class="form-control" name="std_password" >
</div>
<div class="form-group">
  <label> Retype the Student Password:</label>
  <input type="password" class="form-control" name="rty_stdpassword" >
</div>
<br>
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
<input type="submit" name="btnsubmit" class="btn btn-success me-md-2" value="Submit Data">
<input type="reset"  class="btn btn-primary me-md-2 " value="Reset">
<input type="submit" name="btnreject" class="btn btn-danger me-md-2" value="Reject Request"></div>
</form>
<br><br>

    <?php

  }
}
else {
  // if there is no request id (admin add a student inside the system ) ?>
<form action="newpanal.php" method ="POST">
<div class="form-group">
  <label >Student Registration ID:</label>
  <input type="text" class="form-control" name="std_id" value="<?php echo $number; ?>" required readonly>
</div>
<div class="form-group">
  <label>Student Full Name:</label>
  <input type="text" class="form-control" name="std_name" required>
</div>
<div class="form-group">
  <label>Student Birthday:</label>
  <input type="date" class="form-control" name="std_birthday" required>
</div>
<div class="form-group">
  <label>Student Address:</label>
  <input type="text" class="form-control" name="std_address" required>
</div>
<br>
<label> Select Your Gender :</label>
      <div class="form-check form-check-inline">
      
<input class="form-check-input" type="radio" name="std_gender" id="exampleRadios1" value="male" checked>
  <label class="form-check-label" for="exampleRadios1">
 Male</label>
 </div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="std_gender" id="exampleRadios2" value="female" checked>
<label class="form-check-label" for="exampleRadios1">
 Female</label>
</div>
<br>
<br>
<div class="form-group">
  <label>Student Email Address:</label>
  <input type="text" class="form-control" name="std_email"  required>
</div>
<div class="form-group">
  <label>Student Contact Number:</label>
  <input type="text" class="form-control" name="std_contact"  required>
</div>
<div class="form-group">
  <label>Student School:</label>
  <input type="text" class="form-control" name="std_school"  required>
</div>
<br>

<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Select course :</label>
<select class="form-select" name="std_courseid" id="courseid" required>
<?php echo $namelist?>
</select>
</div>
<div class="form-group">
<label> Course :</label>
<input type="text" name="std_course" id ="coursename" class="form-control" readonly required>
</div>
<div class="form-group">
  <label>Batch:</label>
  <input type="text" class="form-control" name="std_batch" required>
</div>
<div class="form-group">
  <label>Parent Name:</label>
  <input type="text" class="form-control" name="prt_name" required>
</div>
<div class="form-group">
  <label>Parent Contact Number:</label>
  <input type="text" class="form-control" name="prt_contact" required>
</div>
<div class="form-group">
  <label>Student Password:</label>
  <input type="password" class="form-control" name="std_password" required>
</div>
<div class="form-group">
  <label> Retype the Student Password:</label>
  <input type="password" class="form-control" name="rty_stdpassword" required>
</div>
<br>
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
<input type="submit" name="btnsubmit" class="btn btn-success me-md-2" value="Submit Data">
<input type="reset"  class="btn btn-primary me-md-2 " value="Reset"></div>
</form>
<br><br><br>

<?php
}
?>

<!--*******************************************************************************************************************************************************************************************-->
  <!-- DATA INSER FUNCTION -->
  <?php
  if(isset($_POST['btnsubmit'])){
    // assing post values to variables
    $reqstid = $_POST["reg_req_id"];
    $stdid = $_POST["std_id"];
    $stdname = $_POST["std_name"];
    $stdbirthday = $_POST["std_birthday"];
    $address = $_POST ["std_address"];
    $gender = $_POST ["std_gender"];
    $email = $_POST ["std_email"];
    $stdcon = $_POST["std_contact"];
    $stdschool = $_POST["std_school"];
    $courseid = $_POST["std_courseid"];
    $course = $_POST["std_course"];
    $batch = $_POST["std_batch"];
    $prtname = $_POST["prt_name"];
    $prtcontact = $_POST["prt_contact"];
    $password = $_POST["std_password"];
    $rtypassword = $_POST["rty_stdpassword"];
    $status= "pending";
    $payment="0000";
    $mark ="00";
    // check password are matched
    if($password == $rtypassword){
      //insert data to data dable
         $sql = "INSERT INTO student(std_id, name, birthday, address,gender , email, contact, school, course,course_id ,batch, prt_name, prt_contact , course_status , payment , mark , password) 
         VALUES ('{$stdid}','{$stdname}','{$stdbirthday}','{$address}','{$gender}','{$email}','{$stdcon}','{$stdschool}','{$course}','{$courseid}','{$batch}','{$prtname}','{$prtcontact}','{$status}','{$payment}','{$mark}','{$password}')";

         // chech data is successfully entered
            $resultset = mysqli_query($con,$sql);
           if ($resultset){
             
            $to =$email;
            $mail_subject = 'Dolex English Acadmey';
            $email_body = "Message from Admin Of Dolex English Academy";
            $email_body .= "<b>From :</b> Admin Of Dolex Accedmey<br>";
            $email_body .= "<b>Subject :</b>Congragulation You Have been selected to  {$course} <br>";
            $email_body .= "<b>Message :</b> You can Enter the Dolex Learning Management Syatem using this username :{$stdid}  and This password :{$password}<br>". nl2br(strip_tags($message));
          
            $header = "From : Dolex \r\nContent-Type:text/html;";
          
            $send_mail_result = mail($to,$mail_subject,$email_body,$header);
          
            if( $send_mail_result){
              
             // delete data from the table
               $sql = "DELETE FROM reg_request WHERE req_id ='$reqstid'";

            // chech data is successfully deleted or not
             $rs = mysqli_query($con,$sql);

             if($rs){
              ?> 
              <script>
                   swal({
                    title: "Data Delete",
                    text: " successfull Data Delete",
                    icon: "success",
                    button: "Ok",
                   });
                 </script>
             <?php
             } else {
              ?> 
             <script>
                  swal({
                   title: "Data Delete",
                   text: " Unsuccessfull Data Delete",
                   icon: "error",
                   button: "Ok",
                  });
                </script>
            <?php
             } 
          
            }else{
              ?> 
              <script>
             alert ("Message has not sent");
           </script>
            <?php
            }
         
             } 
        else {
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
    }else{
      ?> 
      <script>
     alert ("Password You Enter Does Not Match !!!");
   </script>
<?php

    } }
  ?>

<br>
<!--*******************************************************************************************************************************************************************************************-->
<?php
// reject the  request 
if(isset($_POST['btnreject'])){
// assing post values to variables
$reqstid = $_POST["reg_req_id"];
 // delete data from the table
 $sql = "DELETE FROM reg_request WHERE req_id ='$reqstid'";

 // chech data is successfully deleted or not
  $rs = mysqli_query($con,$sql);

  if($rs){
   ?> 
   <script>
        swal({
         title: "Data Delete",
         text: " successfull Data Delete",
         icon: "success",
         button: "Ok",
        });
      </script>
  <?php
  } else {
   ?> 
  <script>
       swal({
        title: "Data Delete",
        text: " Unsuccessfull Data Delete",
        icon: "error",
        button: "Ok",
       });
     </script>
 <?php
  } 

}
?>
<!--*******************************************************************************************************************************************************************************************-->
<br> 
<br>
 <br>
</div>
</div>

  </body>
</html>
