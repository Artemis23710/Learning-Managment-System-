<?php
session_start(); 
?>
<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>
<?php
// get session variable 
$insid = $_SESSION['userid']; 
// autofill dropdown menu
$sql ="SELECT course_id, cuname FROM course WHERE teacher_id ='{$insid}'";
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
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title></title>
  </head>
  <body>
<div class="mainpage">
<div class="sidepanel">
<ul class="sidelist">
<li> <a href="../Dashboard/mainpanel.php"> <img src="../img/dashboard.png" alt="image"> <h2>Dashboard</h2> </a></li>
  <li> <a href="../Course/mainpanel.php"> <img src="../img/course.png" alt="image"> <h2>Course</h2> </a></li>
  <li> <a href="../Students/mainpanel.php"> <img src="../img/student.png" alt="image"> <h2>Student</h2> </a></li>
  <li> <a href="../Lms/mainpanel.php"> <img src="../img/learning.png" alt="image"> <h2>L.M.S</h2> </a></li>
  <li> <a href="../Marks/mainpanel.php"> <img src="../img/report.png" alt="image"> <h2>Marks</h2> </a></li>
  <li> <a href="../Message/mainpanel.php"> <img src="../img/message.png" alt="image"> <h2>Messages</h2> </a></li>
  <li> <a href="../Settings/mainpanel.php"> <img src="../img/setting.png" alt="image"> <h2>Settings</h2> </a></li>
</ul>
<div class="logout">
  <ul class="sidelist">
    <li><a href="../../Logout.php"><img src="../img/logout.png" alt="image"><h2>Logout</h2></a></li>
  </ul>
</div>
</div>
<div class="main_content">
      <div class="header">
<img src="../img/newlogo.png" alt="logo">

      </div>
</div>
<div class ="container">
<h1 style="text-align: center;">List Of Student Details </h1>
<form action="mainpanel.php" method="post">
<br><br>
<h5 style="text-align: center;">Search Student By Student ID </h5>
<div class="form-group">
<label>Student ID : </label>
 <input type="text" name="stdid" class="form-control">
 </div>
 <br>
 <input type="submit" name="btnsearch" class="btn btn-success" value="Search">
 <br><br>
 <h5 style="text-align: center;">Filter Student Details</h5>
<div class="form-group">
   <div class="input-group mb-3">
       <label class="input-group-text" for="inputGroupSelect01">Course</label>
        <select class="form-select" name="courselist">
        <?php echo $namelist?>
      </select>
      </div>
</div>

 <div class="form-group">
<label>Batch : </label>
 <input type="number" name="batch" class="form-control">
 </div>
 <br>
 <label>Course Status : </label>
 <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="stusopttion" id="inlineRadio1" value="pending">
  <label class="form-check-label" for="inlineRadio1">Pending</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="stusopttion" id="inlineRadio2" value="complete">
  <label class="form-check-label" for="inlineRadio2">Completed</label>
</div>
<br>
<br>
<input type="submit" name="btnsearch" class="btn btn-success" value="Filter">

</form>
<br>
<br>
<div>
       <table class="table  table-striped table-hover table-bordered border-dark align-middle">
         <thead class="table-primary">
         <tr>
            <th><h5><b>Student ID</h5></th>
            <th><h5><b>Name</h5></th>
            <th><h5><b>Birthday</h5></th>
            <th><h5><b>Address</h5></th>
            <th><h5><b>Gender</h5></th>
            <th><h5><b>Email</h5></th>
            <th><h5><b>Contact</h5></th>
            <th><h5><b>School</h5></th>
            <th><h5><b>Batch</h5></th>
            <th><h5><b>Course</h5></th>
            <th><h5><b>Parent Name</h5></th>
            <th><h5><b>Parent Contact</h5></th>
            <th><h5><b>Course Status</h5></th>
            <th><h5><b>Payment</h5></th>
            <th><h5><b>Marks</h5></th>
             </tr>
         </thead>
         <?php
         // get session variable 
 if(isset($_POST['btnsearch'])){
  $stdid = $_POST["stdid"];
  $cusid = $_POST["courselist"];
  $batch = $_POST["batch"];
  $cousstus = $_POST["stusopttion"];
          
// serach student by student id

             if (!empty($stdid)){
               $sql ="SELECT * FROM student WHERE std_id ='$stdid'";
               $result_set = mysqli_query($con,$sql);
 
                while ($row = mysqli_fetch_array($result_set)){
                ?>
                 <tr>
                 <td><?php echo $row['std_id'];?></td>
                 <td><?php echo $row['name'];?></td>
                 <td><?php echo $row['birthday'];?></td>
                 <td><?php echo $row['address'];?></td>
                 <td><?php echo $row['gender'];?></td>
                 <td><?php echo $row['email'];?></td>
                 <td><?php echo $row['contact'];?></td>
                <td><?php echo $row['school'];?></td>
                <td><?php echo $row['batch'];?></td>
                <td><?php echo $row['course'];?></td>
                <td><?php echo $row['prt_name'];?></td>
                <td><?php echo $row['prt_contact'];?></td>
                <td><?php echo $row['course_status'];?></td>
                <td><?php echo $row['payment'];?></td>
                <td><?php echo $row['mark'];?></td>
               </tr>
               <?php
                }
               }elseif(!empty($cusid)){
                 // filter students by course 
                $sql ="SELECT * FROM student WHERE course_id ='$cusid'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                </tr>
                <?php
                 }
               }elseif(!empty($batch)){
                 // filter students by batch year
                $sql ="SELECT * FROM student WHERE batch ='$batch'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                </tr>
                <?php
                 }
               }elseif(!empty($cousstus)){
                 // filter students by course status
                $sql ="SELECT * FROM student WHERE course_status ='$cousstus'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                </tr>
                <?php
                 }
               }elseif(!empty($cusid)&& !empty($batch)&& !empty($cousstus)){
                 // filter students by course , batch and course status
                $sql ="SELECT * FROM student WHERE  course_id ='$cusid',batch ='$batch',course_status ='$cousstus'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                </tr>
                <?php
                 }
               }elseif(!empty($cusid)&& !empty($batch)){
                 // filter students by course and batch 
                 $sql ="SELECT * FROM student WHERE  course_id ='$cusid',batch ='$batch'";
                 $result_set = mysqli_query($con,$sql);
   
                  while ($row = mysqli_fetch_array($result_set)){
                  ?>
                   <tr>
                   <td><?php echo $row['std_id'];?></td>
                   <td><?php echo $row['name'];?></td>
                   <td><?php echo $row['birthday'];?></td>
                   <td><?php echo $row['address'];?></td>
                   <td><?php echo $row['gender'];?></td>
                   <td><?php echo $row['email'];?></td>
                   <td><?php echo $row['contact'];?></td>
                  <td><?php echo $row['school'];?></td>
                  <td><?php echo $row['batch'];?></td>
                  <td><?php echo $row['course'];?></td>
                  <td><?php echo $row['prt_name'];?></td>
                  <td><?php echo $row['prt_contact'];?></td>
                  <td><?php echo $row['course_status'];?></td>
                  <td><?php echo $row['payment'];?></td>
                  <td><?php echo $row['mark'];?></td>
                 </tr>
                 <?php
                  } 
               }elseif(!empty($batch)&& !empty($cousstus)){
                  // filter students by  batch and course status
                $sql ="SELECT * FROM student WHERE batch ='$batch',course_status ='$cousstus'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                </tr>
                <?php
                 }
               }else{
                  // filter students by course  and course status
                $sql ="SELECT * FROM student WHERE  course_id ='$cusid',course_status ='$cousstus'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                </tr>
                <?php
                 }
               }
         
  }else {
          $sql ="SELECT * FROM student ";
         $result_set = mysqli_query($con,$sql);

         // get all students data
         while ($row = mysqli_fetch_array($result_set)){
           ?>
           <tr>
             <td><?php echo $row['std_id'];?></td>
             <td><?php echo $row['name'];?></td>
             <td><?php echo $row['birthday'];?></td>
             <td><?php echo $row['address'];?></td>
             <td><?php echo $row['gender'];?></td>
             <td><?php echo $row['email'];?></td>
             <td><?php echo $row['contact'];?></td>
             <td><?php echo $row['school'];?></td>
             <td><?php echo $row['batch'];?></td>
             <td><?php echo $row['course'];?></td>
             <td><?php echo $row['prt_name'];?></td>
             <td><?php echo $row['prt_contact'];?></td>
             <td><?php echo $row['course_status'];?></td>
             <td><?php echo $row['payment'];?></td>
             <td><?php echo $row['mark'];?></td>
           </tr>
           <?php
         }
        }
         ?>
       </table>
     </div>   
</div>
</div>
  </body>
</html>
