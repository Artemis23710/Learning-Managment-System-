<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>
<?php 
// autofill dropdown menu
$sql ="SELECT  cuname,course_id FROM course";
$result = mysqli_query($con,$sql);

$namelist ='';
while($rest = mysqli_fetch_assoc($result)){
  $namelist.= "<option value=\"{$rest['course_id']}\">{$rest['cuname']}</option>";
}
?>



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
<div class ="container">
<h1 style="text-align: center;">Generate Reports</h1>
<br><br>
<form action="mainpanel.php" method="post">
<div class="form-group">
   <div class="input-group mb-3">
       <label class="input-group-text" for="inputGroupSelect01">Report</label>
        <select class="form-select" name="reportlist">
        <option selected>Select Report Type</option>
        <option value="payment">Payment Report</option>
        <option value="mark">Student Mark Report</option>
      </select>
  <input type="submit" name="btnsearch" class="btn btn-success" value="Search">
      </div>
     
</div>
</form>
<!--**********************************************************************************************************************************************************************************-->
<!--Display form to get details to generate reports-->
<?php
     if(isset($_POST['btnsearch'])){
       $repirt_type  =$_POST["reportlist"];

       $payment = "payment";
       $mark = "mark";
       $student ="student";

       if ($repirt_type == $payment){
         ?>
         <h1 style="text-align: center;">Generate Payment Reports</h1>
         <br>
         <br>
         <form action="mainpanel.php" method="post">
         <div class="form-group">
     <div class="input-group mb-3">
       <label class="input-group-text" for="inputGroupSelect01" required>Course</label>
        <select class="form-select" name="courselist">
           <?php echo $namelist?>
        </select>
        </div>
          <input type="submit" name="btnsrch" class="btn btn-success" value="Search">
        </form>
         <?php
       }elseif($repirt_type == $mark){
?>
<h1 style="text-align: center;">Generate Student Mark Reports</h1>
<br><br>
<form action="mainpanel.php" method="post">
<div class="form-group">
     <div class="input-group mb-3">
       <label class="input-group-text" for="inputGroupSelect01" required>Course</label>
        <select class="form-select" name="courselist">
           <?php echo $namelist?>
        </select>
        </div>
     </div>
        <input type="submit" name="searchbtn" class="btn btn-success" value="Search"> 
</form>
<?php
       }
     }
?>
<style>
  @media print{
    /*hide every other element*/
    body{
      visibility:hidden;
    } 
    .print-container, .print-container *{
              visibility : visible;
    }
  }
</style>
<!--**********************************************************************************************************************************************************************************-->
<!--generate reports from user details-->
<?php
    if(isset($_POST['btnsrch'])){
      $cusid = $_POST["courselist"]; 
    
 
      ?>
     <button type="button" class="btn btn-warning" onclick="window.print();">Print</button>
     <br><br>
   <table class="table  table-striped table-hover table-bordered border-dark align-middle print-container">
         <thead class="table-primary">
         <tr>
          <th><h6><b>Payment ID</h6></th>
          <th><h6><b>Student ID</h6></th>
          <th><h6><b>Student Name</h6></th>
          <th><h6><b>Course</h6></th>
          <th><h6><b>Month</h6></th>
          <th><h6><b>Payment</h6></th>
          <th><h6><b> Date</h6></th>
          </tr>
         </thead>
<?php
      $sql ="SELECT * FROM payment WHERE course_id ='$cusid'";
      $resultset = mysqli_query($con,$sql);
      if($resultset){
      while ($row = mysqli_fetch_array($resultset)){
      ?> 
      <tr>
           <td><?php echo $row['payid'];?></td>
           <td><?php echo $row['std_id'];?></td>
           <td><?php echo $row['name'];?></td>
           <td><?php echo $row['course'];?></td>
           <td><?php echo $row['month'];?></td>
           <td><?php echo $row['payment'];?></td>
           <td><?php echo $row['pay_date'];?></td>
           </tr>
     
<?php }
      }else {

        ?> 
    <script>
         swal({
          title: "Search Data ",
          text: " Data Record Not Available",
          icon: "error",
          button: "Ok",
         });
       </script>
   <?php
      }

    }
?>
</table>
<!--**********************************************************************************************************************************************************************************-->
<?php
if(isset($_POST['searchbtn'])){
  $cusid = $_POST["courselist"]; 
   
  ?>
   <button type="button" class="btn btn-warning" onclick="window.print();">Print</button>
     <br><br>
  <table class="table  table-striped table-hover table-bordered border-dark align-middle print-container">
  <thead class="table-primary">
  <tr>
     <th><h5><b>No</h5></th>
     <th><h5><b>Course ID</h5></th>
     <th><h5><b>Batch</h5></th>
     <th><h5><b>Student ID </h5></th>
     <th><h5><b>Student Name</h5></th>
     <th><h5><b>Writing</h5></th>
     <th><h5><b>Reading</h5></th>
     <th><h5><b>Listening</h5></th>
     <th><h5><b>Speaking</h5></th>

      </tr>
  </thead>
  <?php
  $sql ="SELECT * FROM mark  WHERE course_id = '$cusid'";
  $result_set = mysqli_query($con,$sql);
  if($result_set){

  while ($row = mysqli_fetch_array($result_set)){
  ?>
  <tr>
             <td><?php echo $row['mark_id'];?></td>
             <td><?php echo $row['course_id'];?></td>
             <td><?php echo $row['batch'];?></td>
             <td><?php echo $row['std_id'];?></td>
             <td><?php echo $row['name'];?></td>
             <td><?php echo $row['writing'];?></td>
             <td><?php echo $row['reading'];?></td>
             <td><?php echo $row['listing'];?></td>
             <td><?php echo $row['speaking'];?></td>
            
           </tr>
        
          
                   
  <?php
  } } else {
    ?> 
    <script>
         swal({
          title: "Search Data ",
          text: " Data Record Not Available",
          icon: "error",
          button: "Ok",
         });
       </script>
   <?php
  }
  ?>
   </table>
  <?php
}
?>
<!--**********************************************************************************************************************************************************************************-->
</div>
</div>
  </body>
</html>
